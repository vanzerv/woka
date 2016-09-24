<?php

namespace wokacms\assets;

use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/wokacms/';
    public $baseUrl = '@web/themes/wokacms/';
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
        'js/jquery.min.js',
        'js/bootstrap.js',
        'js/app.js',
        'js/slimscroll/jquery.slimscroll.min.js',
        'js/app.plugin.js',
        'js/jPlayer/jquery.jplayer.min.js',
        'js/jPlayer/add-on/jplayer.playlist.min.js',
        'js/jPlayer/demo.js',
        'js/flavr.min.js'     
    ];
    //依赖
    public $depends = [
        
    ];
}
