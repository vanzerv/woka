<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\wechat\wokav_wechatuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wokav-wechatuser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'openid')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'sex')->textInput(['readonly'=>'true']) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true,'readonly'=>'true']) ?>

    <?= $form->field($model, 'headimgurl')->textInput(['maxlength' => true,'readonly'=>'true']) ?>


    <?= $form->field($model, 'user_type')->radioList(['0'=>'普通用户','1'=>'快递员','2'=>'管理员'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '新建') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
