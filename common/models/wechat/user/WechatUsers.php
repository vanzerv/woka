<?php

namespace common\models\wechat\user;

use Yii;

/**
 * This is the model class for table "{{%wechat_users}}".
 *
 * @property integer $wechat_user_id
 * @property integer $wehat_account_id
 * @property string $openid
 * @property string $nickname
 * @property integer $sex
 * @property string $language
 * @property string $city
 * @property string $province
 * @property string $country
 * @property integer $subscribe_time
 * @property string $headimgurl
 * @property string $remark
 * @property integer $groupid
 * @property string $subscribe
 * @property integer $is_vip
 */
class WechatUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wehat_account_id', 'sex', 'subscribe_time', 'groupid', 'is_vip'], 'integer'],
            [['openid'], 'required'],
            [['openid', 'headimgurl'], 'string', 'max' => 250],
            [['nickname'], 'string', 'max' => 100],
            [['language', 'city', 'province', 'country', 'remark'], 'string', 'max' => 45],
            [['openid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wechat_user_id' => '微信用户ID',
            'wehat_account_id' => '多微信平台ID',
            'openid' => 'openid',
            'nickname' => '昵称',
            'sex' => '性别',
            'language' => '语言',
            'city' => '城市',
            'province' => '省份',
            'country' => '国家',
            'subscribe_time' => '关注时间',
            'headimgurl' => '头像',
            'remark' => '标签',
            'groupid' => '用户分组',
            'subscribe' => '用户自我描述',
            'is_vip' => '用户是否vip：0非1是',
        ];
    }

}
