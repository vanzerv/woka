<?php

namespace common\models\wechat\user;

use Yii;

/**
 * This is the model class for table "{{%infoclass}}".
 *
 * @property integer $id
 * @property integer $siteid
 * @property integer $parentid
 * @property string $parentstr
 * @property integer $infotype
 * @property string $classname
 * @property string $linkurl
 * @property string $picurl
 * @property string $picwidth
 * @property string $picheight
 * @property string $seotitle
 * @property string $keywords
 * @property string $description
 * @property integer $orderid
 * @property string $checkinfo
 */
class Infoclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%infoclass}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteid', 'parentid', 'infotype', 'orderid'], 'integer'],
            [['parentid', 'parentstr', 'infotype', 'classname', 'linkurl', 'picurl', 'picwidth', 'picheight', 'seotitle', 'keywords', 'description', 'orderid', 'checkinfo'], 'required'],
            [['checkinfo'], 'string'],
            [['parentstr', 'keywords'], 'string', 'max' => 50],
            [['classname'], 'string', 'max' => 30],
            [['linkurl', 'description'], 'string', 'max' => 255],
            [['picurl'], 'string', 'max' => 100],
            [['picwidth', 'picheight'], 'string', 'max' => 5],
            [['seotitle'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '栏目id',
            'siteid' => '站点id',
            'parentid' => '栏目上级id',
            'parentstr' => '栏目上级id字符串',
            'infotype' => '栏目类型',
            'classname' => '栏目名称',
            'linkurl' => '跳转链接',
            'picurl' => '缩略图片',
            'picwidth' => '缩略图宽度',
            'picheight' => '缩略图高度',
            'seotitle' => 'SEO标题',
            'keywords' => '关键词',
            'description' => '描述',
            'orderid' => '排列排序',
            'checkinfo' => '审核状态',
        ];
    }
}
