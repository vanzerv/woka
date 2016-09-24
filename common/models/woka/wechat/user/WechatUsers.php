<?php

namespace common\models\woka\wechat\user;

use Yii;

/**
 * This is the model class for table "wokav_wechat_users".
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
 * @property integer $user_type
 */
class WechatUsers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wokav_wechat_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wehat_account_id', 'sex', 'subscribe_time', 'groupid', 'is_vip', 'user_type'], 'integer'],
            [['openid'], 'required'],
            [['openid', 'headimgurl'], 'string', 'max' => 250],
            [['nickname'], 'string', 'max' => 100],
            [['language', 'city', 'province', 'country', 'remark', 'subscribe'], 'string', 'max' => 45],
            [['openid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wechat_user_id' => 'ID',
            'wehat_account_id' => '管理的公众号',
            'openid' => 'Openid',
            'nickname' => '微信名',
            'sex' => '性别',
            'language' => '语言',
            'city' => '城市',
            'province' => '省份',
            'country' => '国家',
            'subscribe_time' => '关注时间',
            'headimgurl' => '头像地址',
            'remark' => '备注',
            'groupid' => '用户组',
            'subscribe' => '自我描述',
            'is_vip' => 'Is Vip',
            'user_type' => '用户类型',
        ];
    }
}
