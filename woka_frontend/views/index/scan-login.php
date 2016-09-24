<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="mode mode2">
    <p>用手机扫码&nbsp;安全登录</p>
    <div class="erweima">
        <img id="scanImg" src="/index.php/index/scan-img" alt="" />
    </div>
    <div class="other">
        <a class="a1" id="freshenImg" href="#">刷新二维码</a>
        <a class="a2" href="#">使用帮助</a>
    </div>
</div>

<script>
    var timeAgain = 2000;//每秒轮询一次

    function guid() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
            var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    function verScanLogin()
    {
        $.ajax({
            type: "POST",
            url: "/index.php/index/ajax-scan-login",
            data: {},
            dataType: "json",
            success: function (data) {
                console.log(data);
                if(data.data.scanStatus==1)
                {
                    alert("扫码登录完成！");
                    window.location.href = "/";
                }

            }
        });

    }

</script>
<?php $this->beginBlock('signTab') ?>

//轮询查询扫码状态
 setInterval("verScanLogin()", timeAgain);//1000为1秒钟

$("#freshenImg").click(function(){
$("#scanImg").attr("src","/index.php/index/scan-img?lag="+guid());

});

<?php 
$this->endBlock(); 
$this->registerJs($this->blocks['signTab'],\yii\web\View::POS_END);
?>
