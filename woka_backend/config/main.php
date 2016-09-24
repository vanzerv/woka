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
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
     'language' =>'zh-CN',
     //������վ���
     'homeurl'=>'/backend.php/',
];
