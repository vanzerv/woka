<?php

namespace backend\controllers;

use Yii;
use common\models\wechat\WechatMenu;
use common\models\wechat\SearchWechatMenu;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use wokaextend\wechat\Menu;

/**
 * SubwechatmenuController implements the CRUD actions for WechatMenu model.
 */
class SubwechatmenuController extends Controller
{
    
    /**
     * Summary of init 替换为内页layout
     */
    public function init()
    {
        parent::init();
        $this->layout="sub.php";
    }
    
    /**
     * Summary of behaviors  行为验证
     * @return mixed
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WechatMenu models.  菜单列表展示
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchWechatMenu();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Summary of actionApplymenu  应用微信菜单设置
     */
    public function actionApplymenu()
    {
        header("Content-type: text/html; charset=utf-8");
        $menuListObj= WechatMenu::find()->all();  
        
        /****按钮类型type****/
        $arrButtonType=[
            '1'=>'click',
            '2'=>'view',
            '3'=>'scancode_push',
            '4'=>'scancode_waitmsg',
            '5'=>'pic_sysphoto',
            '6'=>'pic_photo_or_album',
            '7'=>'pic_weixin',
            '8'=>'location_select',            
            ];        
        $menuList=array();   
        //遍历转换为菜单数组
        
        foreach($menuListObj as $menuRowObj)
        {
            $menuRow=array();
            $menuRow['id']=$menuRowObj->id;
            $menuRow['pid']=$menuRowObj->pid;
            $menuRow['name']=$menuRowObj->name;
            $menuRow['type']=$arrButtonType[$menuRowObj->type] ;
            $menuRow['code']=$menuRowObj->code;
            $menuList[]=$menuRow;
        }  
        $session= \Yii::$app->session;
       if( Menu::setMenu($menuList))
       {
           $session->setFlash['success']='应用菜单完成';
       }else
       {
          $session->setFlash['error']='应用菜单错误';
       }
       
       return $this->redirect('index');        
    }
    /**
     * Displays a single WechatMenu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WechatMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WechatMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSetmenu()
    {
        echo '设置菜单';
        exit;
    }
    /**
     * Updates an existing WechatMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WechatMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WechatMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WechatMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WechatMenu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
