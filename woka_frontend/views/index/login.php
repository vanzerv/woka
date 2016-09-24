<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


   <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<dl class="admin_login">
        <dt>
            <strong>WOKA</strong>
            <em>Management System</em>
        </dt>
    <?php 
    if(!empty( $error))
    {?>
         <dt>
            <em style="color:#FFFFFF;"><?=$error?></em>
        </dt>
   <?php } 
    ?>

      
        <dd class="user_icon">           
            <input type="text" name="LoginForm[username]" placeholder="账号" class="login_txtbx" />
        </dd>
        <dd class="pwd_icon">
          
            <input type="password" name="LoginForm[password]" placeholder="密码" class="login_txtbx" />
        </dd>
       <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <dd class="val_icon">
            <div class="checkcode">
                <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
                <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
            </div>
            <input type="button" value="验证码核验" class="ver_btn" onclick="validate();">
        </dd>
        <dd>
            <input type="button" value="立即登陆" class="submit_btn" />
        </dd>
        <dd>
            <p>© 2015-<?= date('Y') ?> WOKA 版权所有</p>
            <p>woka 网络</p>
        </dd>
    </dl>


   <?php ActiveForm::end(); ?>

