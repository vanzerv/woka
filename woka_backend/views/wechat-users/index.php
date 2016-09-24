<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\wechat\search_wokav_wechatuser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '微信用户管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wokav-wechatuser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--  微信不需要创建
    <p>
        <?= Html::a(Yii::t('app', 'Create Wokav Wechatuser'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

      //      'wechat_user_id',
            'openid',
            'nickname',
       
             'city',
             'province',
             'country',
            
              [
              'attribute' => 'user_type',
               'label' => '会员类型',
               'filter' =>Html::dropDownList('WechatUsersSearch[user_type]', isset($_GET['WechatUsersSearch']['user_type']) ?$_GET['WechatUsersSearch']['user_type']:'all', array("0"=>'全部',"1"=>'快递员',"2"=>'管理员'), ['class' => 'form-control']),
               'format'=>'raw',
               'value' => function($model){
                        if($model->user_type == 0)
                        {
                           return  '普通会员';   
                        }elseif($model->user_type == 1)
                        {
                              return  '快递员';
                        }elseif($model->user_type == 2)
                        {
                              return  '管理员';
                        }
                
               },
            ],    
            // 'headimgurl:url',
            // 'subscribe_time:datetime',
            // 'remark',
            // 'groupid',
            // 'subscribe',
            // 'is_vip',

            [
             'class' => 'yii\grid\ActionColumn',
              'header' => '操作',
               'template' => '{update} ',                
              'headerOptions' => ['width' => '80'],
             ],

        ],
    ]); ?>

</div>
