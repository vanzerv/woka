<?php

namespace common\models\woka\user;

use Yii;
use yii\base\NotSupportedException;
use wokav\behaviors\TimestampBehavior;
use wokav\vinterface\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $user_id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property string $cnname
 * @property string $enname
 * @property string $avatar
 * @property integer $sex
 * @property string $cardnum
 * @property string $email
 * @property string $qqnum
 * @property string $mobile
 * @property integer $enteruser
 * @property integer $expval
 * @property string $integral
 * @property string $regtime
 * @property string $regip
 * @property string $logintime
 * @property string $loginip
 * @property integer $wechatid
 * @property string $auth_key
 * @property string $autograph
 */
class Users extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['sex', 'enteruser', 'expval', 'integral', 'regtime', 'logintime', 'wechatid'], 'integer'],
            [['username', 'cardnum'], 'string', 'max' => 32],
            [['password', 'nickname', 'cnname', 'enname'], 'string', 'max' => 50],
            [['avatar', 'autograph'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 40],
            [['qqnum', 'mobile', 'regip', 'loginip'], 'string', 'max' => 20],
            [['auth_key'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户id',
            'username' => '用户名',
            'password' => '密码',
            'nickname' => '昵称',
            'cnname' => '姓名',
            'enname' => '英文名',
            'avatar' => '头像',
            'sex' => '性别:',
            'cardnum' => '证件号码',
            'email' => '电子邮件',
            'qqnum' => 'QQ号码',
            'mobile' => '手机',
            'enteruser' => '认证',
            'expval' => '经验值',
            'integral' => '积分',
            'regtime' => '注册时间',
            'regip' => '注册IP',
            'logintime' => '登录时间',
            'loginip' => '登录IP',
            'wechatid' => '绑定微信用户',
            'auth_key' => 'Auth Key',
            'autograph' => '个性签名',
        ];
   
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['user_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token          
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * 验证密码
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return md5(md5($password))==$this->password;
    }

    /**
     *设置密码
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5(md5($password));
    }   

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
