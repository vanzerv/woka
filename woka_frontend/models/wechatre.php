<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wechat_re".
 *
 * @property integer $id
 * @property string $requ
 * @property integer $retype
 * @property integer $type
 * @property string $content
 * @property string $title
 * @property string $description
 * @property string $pic_url
 * @property string $url
 */
class wechatre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wechat_re';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requ', 'retype', 'type'], 'required'],
            [['retype', 'type'], 'integer'],
            [['requ', 'content', 'description', 'pic_url', 'url'], 'string', 'max' => 250],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requ' => 'Requ',
            'retype' => 'Retype',
            'type' => 'Type',
            'content' => 'Content',
            'title' => 'Title',
            'description' => 'Description',
            'pic_url' => 'Pic Url',
            'url' => 'Url',
        ];
    }
}
