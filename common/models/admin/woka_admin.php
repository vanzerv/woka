<?php

namespace common\models\admin;

use Yii;
use yii\base\NotSupportedException;
use wokav\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use wokav\vinterface\IdentityInterface;


/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $question
 * @property string $answer
 * @property string $cnname
 * @property string $enname
 * @property string $avatar
 * @property integer $sex
 * @property integer $birthtype
 * @property string $birth_year
 * @property string $birth_month
 * @property string $birth_day
 * @property string $astro
 * @property integer $bloodtype
 * @property string $trade
 * @property string $live_prov
 * @property string $live_city
 * @property string $live_country
 * @property string $home_prov
 * @property string $home_city
 * @property string $home_country
 * @property integer $cardtype
 * @property string $cardnum
 * @property string $intro
 * @property string $email
 * @property string $qqnum
 * @property string $mobile
 * @property string $telephone
 * @property string $address_prov
 * @property string $address_city
 * @property string $address_country
 * @property string $address
 * @property string $zipcode
 * @property string $enteruser
 * @property integer $expval
 * @property string $integral
 * @property string $regtime
 * @property string $regip
 * @property string $logintime
 * @property string $loginip
 * @property string $qqid
 * @property string $weiboid
 * @property string $auth_key
 * @property string $autograph
 */
class woka_admin extends admin implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    
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
        return static::findOne(['id' => $id]);
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
        return md5(md5($password.Yii::$app->params["backend_pwdPrefix"]))==$this->password;
    }

    /**
     *设置密码
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5(md5($password.Yii::$app->params["backend_pwdPrefix"]));
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
