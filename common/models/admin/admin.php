<?php

namespace common\models\admin;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property integer $question
 * @property string $answer
 * @property integer $levelname
 * @property string $checkadmin
 * @property string $loginip
 * @property string $logintime
 */
class admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nickname', 'question', 'answer', 'levelname', 'checkadmin', 'loginip', 'logintime'], 'required'],
            [['question', 'levelname', 'logintime'], 'integer'],
            [['checkadmin'], 'string'],
            [['username'], 'string', 'max' => 30],
            [['password', 'nickname'], 'string', 'max' => 32],
            [['answer'], 'string', 'max' => 50],
            [['loginip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '信息id',
            'username' => '用户名',
            'password' => '密码',
            'nickname' => '昵称',
            'question' => '登录提问',
            'answer' => '登录回答',
            'levelname' => '级别',
            'checkadmin' => '审核',
            'loginip' => '登录IP',
            'logintime' => '登录时间',
        ];
    }
}
