<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\wechat\wokav_wechatuser */

$this->title = Yii::t('app', 'Create Wokav Wechatuser');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wokav Wechatusers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wokav-wechatuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
