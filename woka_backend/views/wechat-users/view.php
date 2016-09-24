<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\wechat\wokav_wechatuser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wokav Wechatusers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wokav-wechatuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'openid',
            'nickname',
            'sex',
            'language',
            'city',
            'province',
            'country',
            'headimgurl:url',
            'subscribe_time:datetime',
            'remark',
            'groupid',
            'subscribe',
            'is_vip',
        ],
    ]) ?>

</div>
