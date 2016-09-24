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
    //�Զ���ģ��
 
    'components' => [  
        'user' => [
            'class'=>'wokav\components\vzUser',
            'identityClass' => 'wokav\models\user\User',
            'enableAutoLogin' => true, //�Ƿ������Զ���¼
            'loginUrl'=>['index/login'], //�û���¼·��
        ],      
            
         //�ʲ�Ŀ¼����
         'assetManager'=>array( 
            // ���ô��assets���ļ�Ŀ¼λ��
           
            // ���÷���assetsĿ¼��url��ַ
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
        //url��ʽ
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        //����/����ģ������        
    ],
    'params' => $params,
    'language'=>'zh-CN',
];
