<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\wechat\wokav_wechatuser */

$this->title = Yii::t('app', ' {modelClass}: ', [
    'modelClass' => '微信用户修改',
]) . ' ' . $model->wechat_user_id;

?>
<div class="wokav-wechatuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
