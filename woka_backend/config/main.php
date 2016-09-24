<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'modules' => [],
    'components' => [
      'user' => [      
            'identityClass' => 'common\models\admin\woka_admin',           
        ],
        'admin' => [
            'class'=>'wokav\components\vzAdmin',
            'identityClass' => 'common\models\admin\woka_admin',
            'enableAutoLogin' => true, //是否允许自动登录
            'loginUrl'=>['index/login'], //用户登录路径
        ],
         //资产目录设置
         'assetManager'=>array( 
            // 设置存放assets的文件目录位置
        
            // 设置访问assets目录的url地址
        ),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
     'language' =>'zh-CN',
     //设置网站入口
     'homeurl'=>'/backend.php/',
];
