<?php
/**
 *系统消息组件 
 * */
namespace wokav\components;

use Yii;
use yii\base\Component;
use wokacms\models\smessage\sysmessage;
/**
 * Summary of sysmessage
 * @author vanzer || wokav
 * @since 1.0.1
 * @date 2015.12.03
 */
class Csysmessage extends Component
{   
    public $interface;  
    /**
     * 初始化函数
     */
    public function init()
    {      
        parent::init();     
        if ($this->interface === null) {
            throw new InvalidConfigException('接口interface未定义.');
        }            
    }    
    private $obj_sysmessage = false;
    /**
     * 获取模型   
     */
    public function getObj()
    { 
        if(!$this->obj_sysmessage)
        {
            // 存在用户 绑定当前
            if(!Yii::$app->user->isGuest)
            {
                $_Msysmessage=new sysmessage();
                $this->obj_sysmessage=$_Msysmessage->getObj(Yii::$app->user->id); 
            } else
            {
                $this->obj_sysmessage=false;
            }
        }
        
        return $this->obj_sysmessage;
    }
    /**
     *验证并设置--     
     * @throws
     */
    public function setObj($sysmessage)
    {
        if ($sysmessage instanceof SysMessage) {
            $this->_sysmessage = $sysmessage;        
        } elseif ($sysmessage === null) {
            $this->_sysmessage = null;
        } else {
            throw new InvalidValueException('接口实现错误.');
        }
    }
    
}
