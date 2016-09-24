<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
use yii\helpers\ArrayHelper;
require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../common/config/bootstrap.php');

$config = ArrayHelper::merge(
    require(__DIR__ . '/../common/config/main.php'),
    require(__DIR__ . '/../../main-local.php'),
    require(__DIR__ . '/../woka_frontend/config/main.php'),
    require(__DIR__ . '/../woka_frontend/config/main-local.php')
);
$application = new yii\web\Application($config);
$application->run();