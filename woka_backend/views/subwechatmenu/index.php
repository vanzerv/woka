<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel common\models\wechat\SearchWechatMenu */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '微信菜单设置');

?>
<div class="wechat-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '添加菜单'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', '应用此菜单'), ['applymenu'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'name',
             [
            'label' => '按钮类型',
             'format' => 'raw',
             'options' => ['width' => '200px;'],
              'value' => function ($data) {  
               return $data->getType($data->type);
               }
           ],
            'code',

          
           [
           //动作列yii\grid\ActionColumn 
           //用于显示一些动作按钮，如每一行的更新、删除操作。
          'class' => 'yii\grid\ActionColumn',
          'header' => '操作', 
          'template' => ' {update}{delete}',//更新
          'headerOptions' => ['width' => '50'],
         
         ],
        ],
    ]); ?>

</div>
