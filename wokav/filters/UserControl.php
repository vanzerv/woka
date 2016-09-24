<?php
/*********************
 * @ad ����������
 * @con ����Ȩ�޹���
 * 
 * *********************************/

namespace wokav\filters;

use Yii;
use yii\base\Action;
use yii\base\ActionFilter;
use yii\di\Instance;
use common\models\woka\user\Users;
use wokav\components\vzUser; //�û���
use yii\web\ForbiddenHttpException;


class UserControl extends ActionFilter
{
    /**
     * @var ���� components
     */
    public $vzuser = 'user';
    /**
     * @var δͨ���ص�
     *
     * /
    public $denyCallback;
    /**
     * @var ������֤������
     */
    public $ruleConfig = ['class' => 'wokav\filters\BaseRule'];
    /**
     * @var ����
     * @see ruleConfig
     */
    public $rules = [];

    /**
     * ��ʼ��[ [����] ]����ͨ��ʵ������������ù���
     */
    public function init()
    {
        parent::init();
        //ȷ����Ϊ����ȷ��Ϊ
        $this->vzuser = Instance::ensure($this->vzuser, vzUser::className()); 
    
        
        foreach ($this->rules as $i => $rule) {        
            if (is_array($rule)) {
                $this->rules[$i] = Yii::createObject(array_merge($this->ruleConfig, $rule));
            }
        }   
    }

    /**
     * ��rule�����õ�action����֤����ǰ
     * @param Action $action rule�����õ�action
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
     * δͨ����֤����
     * @param User $vzuser the current user
     * @throws ForbiddenHttpException if the user is already logged in.
     */
    protected function denyAccess($vzuser)
    {
        //δͨ����֤
        if ($vzuser->getIsGuest()) {
            $vzuser->loginRequired();
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'û��Ȩ�޷�����Ϣ.'));
        }
    }
}
