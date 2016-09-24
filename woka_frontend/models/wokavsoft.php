<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wokav_soft".
 *
 * @property string $id
 * @property string $weid
 * @property integer $classid
 * @property integer $parentid
 * @property string $parentstr
 * @property integer $mainid
 * @property integer $mainpid
 * @property string $mainpstr
 * @property string $title
 * @property string $colorval
 * @property string $boldval
 * @property string $flag
 * @property string $filetype
 * @property string $softtype
 * @property string $language
 * @property string $accredit
 * @property string $softsize
 * @property string $unit
 * @property string $runos
 * @property string $website
 * @property string $demourl
 * @property string $dlurl
 * @property string $source
 * @property string $author
 * @property string $linkurl
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $picurl
 * @property string $picarr
 * @property string $hits
 * @property string $orderid
 * @property integer $posttime
 * @property string $checkinfo
 * @property string $delstate
 * @property string $deltime
 */
class wokavsoft extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wokav_soft';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weid', 'classid', 'parentid', 'mainid', 'mainpid', 'hits', 'orderid', 'posttime', 'deltime'], 'integer'],
            [['content', 'picarr', 'checkinfo', 'delstate'], 'string'],
            [['parentstr', 'mainpstr', 'title'], 'string', 'max' => 80],
            [['colorval', 'boldval', 'softtype', 'language', 'accredit', 'softsize'], 'string', 'max' => 10],
            [['flag'], 'string', 'max' => 30],
            [['filetype', 'unit'], 'string', 'max' => 4],
            [['runos', 'source', 'author', 'keywords'], 'string', 'max' => 50],
            [['website', 'demourl', 'dlurl', 'linkurl', 'description'], 'string', 'max' => 255],
            [['picurl'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weid' => 'Weid',
            'classid' => 'Classid',
            'parentid' => 'Parentid',
            'parentstr' => 'Parentstr',
            'mainid' => 'Mainid',
            'mainpid' => 'Mainpid',
            'mainpstr' => 'Mainpstr',
            'title' => 'Title',
            'colorval' => 'Colorval',
            'boldval' => 'Boldval',
            'flag' => 'Flag',
            'filetype' => 'Filetype',
            'softtype' => 'Softtype',
            'language' => 'Language',
            'accredit' => 'Accredit',
            'softsize' => 'Softsize',
            'unit' => 'Unit',
            'runos' => 'Runos',
            'website' => 'Website',
            'demourl' => 'Demourl',
            'dlurl' => 'Dlurl',
            'source' => 'Source',
            'author' => 'Author',
            'linkurl' => 'Linkurl',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'content' => 'Content',
            'picurl' => 'Picurl',
            'picarr' => 'Picarr',
            'hits' => 'Hits',
            'orderid' => 'Orderid',
            'posttime' => 'Posttime',
            'checkinfo' => 'Checkinfo',
            'delstate' => 'Delstate',
            'deltime' => 'Deltime',
        ];
    }
}
