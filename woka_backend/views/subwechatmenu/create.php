<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\wechat\WechatMenu */

$this->title = Yii::t('app', '添加微信菜单');

?>
<div class="wechat-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
