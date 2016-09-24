<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

   <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="#"><span class="h1 font-bold">WOKAM</span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>登陆</strong>
        </header>              
             <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group">
              <!-- 用户信息 -->
                 <?= $form->field($model, 'username')->input('text',['class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'用户名']) ?>
          </div>
          <div class="form-group">
                 <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control rounded input-lg text-center no-border','placeholder'=>'密码']) ?>
          </div>
             <?= $form->field($model, 'rememberMe')->checkbox() ?>
        
            <?= Html::submitButton('  <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">登&nbsp;&nbsp;&nbsp;陆</span>', ['class' => 'btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded', 'name' => 'login-button']) ?>
          <div class="text-center m-t m-b">
              <a href="#"><small>忘记密码?</small></a>
                忘记密码 <?= Html::a('【点我】', ['site/request-password-reset']) ?>重置
          </div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>还没有账号?</small></p>  
          <?= Html::a('注册账号', ['index/signup'],['class'=>'btn btn-lg btn-info btn-block rounded']) ?>
        <?php ActiveForm::end(); ?>
      </section>
    </div>
  </section>