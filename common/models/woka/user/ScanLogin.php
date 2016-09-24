<?php

namespace common\models\woka\user;

use Yii;

/**
 * This is the model class for table "{{%scanlogin}}".
 *
 * @property string $token
 * @property integer $status
 * @property integer $addtime
 * @property string $openid
 */
class ScanLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%scanlogin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'addtime'], 'required'],
            [['status', 'addtime'], 'integer'],
            [['token', 'openid'], 'string', 'max' => 50],
            [['token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token' => '扫码登录的唯一Token',
            'status' => '登录二维码状态:0生成,1扫码 10登录完成',
            'addtime' => '添加时间',
            'openid' => '扫码的微信openid',
        ];
    }
}
