<?php
/*********************
 * @ad 基础过滤类
 * @con 基础权限过滤
 * 
 * *********************************/

namespace wokav\filters;

use Yii;
use yii\base\Action;
use yii\base\ActionFilter;
use yii\di\Instance;
use common\models\woka\user\Users;
use wokav\components\vzUser; //用户类
use yii\web\ForbiddenHttpException;


class UserControl extends ActionFilter
{
    /**
     * @var 对象 components
     */
    public $vzuser = 'user';
    /**
     * @var 未通过回掉
     *
     * /
    public $denyCallback;
    /**
     * @var 规则验证类配置
     */
    public $ruleConfig = ['class' => 'wokav\filters\BaseRule'];
    /**
     * @var 规则
     * @see ruleConfig
     */
    public $rules = [];

    /**
     * 初始化[ [规则] ]阵列通过实例化对象的配置规则。
     */
    public function init()
    {
        parent::init();
        //确保行为绑定正确行为
        $this->vzuser = Instance::ensure($this->vzuser, vzUser::className()); 
    
        
        foreach ($this->rules as $i => $rule) {        
            if (is_array($rule)) {
                $this->rules[$i] = Yii::createObject(array_merge($this->ruleConfig, $rule));
            }
        }   
    }

    /**
     * 在rule中配置的action，验证规则前
     * @param Action $action rule中配置的action
     */
    public function beforeAction($action)
    {        
        $vzuser = $this->vzuser;
        $request = Yii::$app->getRequest();        
        /* @var $rule base */
        foreach ($this->rules as $rule) {
            if ($allow = $rule->allows($action, $vzuser, $request)) {
                return true;
            } elseif ($allow === false) {
                if (isset($rule->denyCallback)) {
                    call_user_func($rule->denyCallback, $rule, $action);
                } elseif (isset($this->denyCallback)) {
                    call_user_func($this->denyCallback, $rule, $action);
                } else {
                    $this->denyAccess($vzuser);
                }
                return false;
            }
        }
        if (isset($this->denyCallback)) {
            call_user_func($this->denyCallback, null, $action);
        } else {
            $this->denyAccess($vzuser);
        }
        return false;
    }

    /**
     * 未通过验证处理
     * @param User $vzuser the current user
     * @throws ForbiddenHttpException if the user is already logged in.
     */
    protected function denyAccess($vzuser)
    {
        //未通过验证
        if ($vzuser->getIsGuest()) {
            $vzuser->loginRequired();
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', '没有权限访问信息.'));
        }
    }
}
