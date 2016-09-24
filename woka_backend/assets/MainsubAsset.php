<?php
namespace backend\assets;
use yii\web\AssetBundle;
class MainsubAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/backend/';
    public $baseUrl = '@web/themes/backend/';
    public $css = [
      'js/jPlayer/jplayer.flat.css',
      'css/bootstrap.css',
      'css/animate.css',
      'css/font-awesome.min.css',
      'css/simple-line-icons.css',
      'css/font.css',
      'css/app.css'  
  ];
    
    public $js = [      
       'js/bootstrap.js',
       'js/app.js',
       'js/slimscroll/jquery.slimscroll.min.js',
       "js/jquery.ui.touch-punch.min.js",
       "js/jquery-ui-1.10.3.custom.min.js",
        "js/app.plugin.js",        
       'js/flavr.min.js'     
   ];
    //依赖
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
