<?php

namespace common\models\woka\wechat\account;

use Yii;

/**
 * This is the model class for table "wokav_wechat_account".
 *
 * @property string $wechat_account_id
 * @property integer $user_id
 * @property string $public_name
 * @property string $public_id
 * @property string $wechat
 * @property string $interface_url
 * @property string $token
 * @property integer $is_use
 * @property string $type
 * @property string $appid
 * @property string $secret
 * @property string $encodingaeskey
 * @property string $domain
 * @property integer $is_bind
 * @property string $woka_token
 */
class WechatAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wokav_wechat_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'is_use', 'is_bind'], 'integer'],
            [['woka_token'], 'required'],
            [['public_name', 'woka_token'], 'string', 'max' => 50],
            [['public_id', 'wechat'], 'string', 'max' => 100],
            [['interface_url', 'appid', 'secret', 'encodingaeskey'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 250],
            [['type'], 'string', 'max' => 10],
            [['domain'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wechat_account_id' => '主键',
            'user_id' => '用户ID',
            'public_name' => '公众号名称',
            'public_id' => '公众号原始id',
            'wechat' => '微信号',
            'interface_url' => '接口地址',
            'token' => 'Token',
            'is_use' => '是否为当前公众号',
            'type' => '公众号类型',
            'appid' => 'AppID',
            'secret' => 'AppSecret',
            'encodingaeskey' => 'EncodingAESKey',
            'domain' => '自定义域名',
            'is_bind' => '是否为微信开放平台绑定账号',
            'woka_token' => '微信关联token(若采用ID标识，可能会出现仿造现象)',
        ];
    }
}
