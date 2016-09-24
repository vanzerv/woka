<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
/// <reference path="../../web/js/jquery.min.js" />
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
$this->title = '喔咔用户统一注册页面';
?>
 <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="#"><span class="h1 font-bold">WOKAM</span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>喔咔用户统一注册页面</strong>
        </header>
          <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['onsubmit'=>'return signup_submit();']]);?>
          <div class="form-group">
           <?= $form->field($model, 'username')->input('text',['class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'用户名']) ?>
          </div>
          <div class="form-group">
                  <?= $form->field($model, 'email')->input('text',['class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'邮箱']) ?>
 
          </div>
          <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'密码']) ?>
          </div>
          <div class="checkbox i-checks m-b">
            <label class="m-l">
              <input type="checkbox" checked><i></i> 同意<a href="#">【喔咔用户条款】</a>
            </label>
          </div>
           <?= Html::submitButton('<i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">注册</span>', ['class' => 'btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded', 'name' => 'signup-button']) ?>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>已经有喔咔账号?</small></p>
             <?= Html::a('去登陆', ['index/login'],['class'=>'btn btn-lg btn-info btn-block btn-rounded']) ?>
        <?php ActiveForm::end(); ?>
      </section>

     <link rel="stylesheet" type="text/css" href="/index_files/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/index_files/default.css">
    <link rel="stylesheet" type="text/css" href="/index_files/style.css">
    <!-- END DEMO PAGE CSS -->
    <!-- flavr CSS -->
    <link rel="stylesheet" type="text/css" href="/index_files/animate.css">
    <link rel="stylesheet" type="text/css" href="/index_files/flavr.css">
        <script> 
            //表单验证
            function signup_submit() {
                if ($("input[type='checkbox']").prop('checked')) {
                    return true;
                } else {                 
                     $.flavr('请先同意本站条款!');    
                    return false;
                }
            }

        </script>
    </div>
  </section>
