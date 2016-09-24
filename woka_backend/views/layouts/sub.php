<?php
use yii\helpers\Html;
use backend\assets\MainsubAsset;
MainsubAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"class="app" > 
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
    <script src="/js/ie/html5shiv.js"></script>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body  style="overflow:auto;">
<?php $this->beginBody() ?>
      <section class="vbox">  
    <section class="scrollable wrapper">
      <?= $content ?>
    </section>    
  </section>
  <!-- / footer -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
