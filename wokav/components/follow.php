<?php
/**
 * Summary of namespace wokav\components
 * 
 *�û�������û������û�ע�ᡢ��½���˳�����ز��� 
 * 
 * */
namespace wokav\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidValueException;
use yii\web\Cookie;
/**
 * Summary of vzUser
 * @author vanzer || wokav
 * @since 1.0.1
 * @date 2015.11.11 
 */
class follow extends Component
{
    const EVENT_BEFORE_LOGIN = 'beforeLogin';
    const EVENT_AFTER_LOGIN = 'afterLogin';
    const EVENT_BEFORE_LOGOUT = 'beforeLogout';
    const EVENT_AFTER_LOGOUT = 'afterLogout';  
    //vanzer_add����
    private $_config=array();

    /**
     * @var string the class name of the [[identity]] object.
     */
    public $interface;

    /**
     * ��ʼ������
     */
    public function init()
    {      
        parent::init();     
        if ($this->interface === null) {
            throw new InvalidConfigException('δʵ�ֽӿ�FollowInterface.');
        }          
    }
    private $_identity = false;
    /**
     * ��ȡͬ����    
     */
    public function getIdentity($autoRenew = true)
    {      
        if ($this->_identity === false) {
            if ($this->enableSession && $autoRenew) {
                $this->_identity = null;
                $this->renewAuthStatus();
            } else {
                return null;
            }
        }
        return $this->_identity;
    }

    /**
     *��֤������--     
     * @throws
     */
    public function setIdentity($identity)
    {
        if ($identity instanceof IdentityInterface) {
            $this->_identity = $identity;
            $this->_access = [];
        } elseif ($identity === null) {
            $this->_identity = null;
        } else {
            throw new InvalidValueException('�ӿ�ʵ�ִ���.');
        }
    }

  
    protected function beforeLogin($identity, $cookieBased, $duration)
    {        
        $event = new vzUserEvent([
            'identity' => $identity,
            'cookieBased' => $cookieBased,
            'duration' => $duration,
        ]);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        return $event->isValid;
    }

  
    protected function afterLogin($identity, $cookieBased, $duration)
    {
        $this->trigger(self::EVENT_AFTER_LOGIN, new vzUserEvent([
            'identity' => $identity,
            'cookieBased' => $cookieBased,
            'duration' => $duration,
        ]));
    }

  
    protected function beforeLogout($identity)
    {
        $event = new vzUserEvent([
            'identity' => $identity,
        ]);
        $this->trigger(self::EVENT_BEFORE_LOGOUT, $event);

        return $event->isValid;
    }

    protected function afterLogout($identity)
    {
        $this->trigger(self::EVENT_AFTER_LOGOUT, new vzUserEvent([
            'identity' => $identity,
        ]));
    }

   
   
}
