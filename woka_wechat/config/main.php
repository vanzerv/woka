<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'WOKAM',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],  
    'defaultRoute' => 'index',
    'controllerNamespace' => 'wechat\controllers',
    //自定义模块
 
    'components' => [  
        'user' => [
            'class'=>'wokav\components\vzUser',
            'identityClass' => 'wokav\models\user\User',
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
        //url方式
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        //新增/引用模块配置        
    ],
    'params' => $params,
    'language'=>'zh-CN',
];
