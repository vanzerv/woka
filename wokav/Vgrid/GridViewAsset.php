<?php


namespace wokav\Vgrid;

use yii\web\AssetBundle;

class GridViewAsset extends AssetBundle
{
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii.gridView.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
