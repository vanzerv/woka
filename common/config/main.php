<?php
return [
    //第三方库地址
    'vendorPath' => dirname(dirname(__DIR__)) . '/../vendor', 
     'language' => 'zh-CN' , //中文语言包
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
