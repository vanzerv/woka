<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author woka
 * @since 1.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/frontend/';
    public $baseUrl = '@web/themes/frontend/';
    public $css = [
        'login/css/login.css',
    ];
    public $js = [
         'login/js/verificationNumbers.js',
         'login/js/Particleground.js',       
         'login/js/login.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
     //   'yii\bootstrap\BootstrapAsset',
    ];
}
