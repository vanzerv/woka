<?php
/**
 *系统消息组件 
 * */
namespace wokav\components;

use Yii;
use yii\base\Component;
use app\models\song\likesong;
/**
 * Summary of sysmessage
 * @author vanzer || wokav
 * @since 1.0.1
 * @date 2015.12.03
 */
class Clikesong extends Component
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
    private $obj_likesong = false;
    /**
     * 获取模型   
     */
    public function getObj()
    { 
        if(!$this->obj_likesong)
        {
           
            // 存在用户 绑定当前
            if(!Yii::$app->user->isGuest)
            {
                
                $_Mlikesong=new likesong();
                
                $this->obj_likesong=$_Mlikesong->getObj(Yii::$app->user->id); 
            } else
            {
                $this->obj_likesong=false;
            }
        }
        
        return $this->obj_likesong;
    }
    /**
     *无需填充模型     
     * @throws
     */
    public function setObj($_Mlikesong)
    {
        if ($_Mlikesong) {
            $this->obj_likesong = $_Mlikesong;        
        } elseif ($_Mlikesong === null) {
            $this->obj_likesong = null;
        } else {
            throw new InvalidValueException('接口实现错误.');
        }
    }
    
}
