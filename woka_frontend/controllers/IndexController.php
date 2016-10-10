<?php
namespace frontend\controllers;

use Yii;
use common\models\woka\user\LoginForm;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use wokav\filters\UserControl;
use wokaextend\components\qrcode\QrCode; //二维码生成处理类
use common\models\woka\user\ScanLogin; //扫码登录
use wokaextend\wokasoft\wechat\WechatAuthUrl; 
use wokaextend\structure\BaseAPI; //接口数据结构

/**
 * Summary of IndexController  网站路由默认入口控制器
 */
class IndexController extends Controller
{    
    /**
     * @inheritdoc  行为验证
     */
    public function behaviors()
    {
        return [
            //用户行为验证
            'access' => [
                'class' => UserControl::className(),   
                'only' => ['logout', 'signup','index'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            //数据提交验证
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }    
    /**
     * 显示首页
     * @return mixed
     */
    public function actionIndex()
    {                 
        Yii::$app->session->setFlash('error', '网站首页正在开发中！');
        return $this->render('index');
    }
    /**
     * 登录
     * @return mixed
     */
    public function actionLogin()
    {      
      //切换layout
        $this->layout='login';        
        //是否登录,登录则跳转至首页
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }    
        //初始化form表单
        $model = new LoginForm();
        //前端错误提示
        $error='';     
        //post 登录数据提交
        if(Yii::$app->request->isPost)
        {
            //绑定数据
            $model->load(Yii::$app->request->post());  
            //登录验证
            if ($model->login()) {
                return $this->goBack();
            }else {
                //绑定错误
                $error=$model->getErrors();
                $error=current($error)[0] ;                
            }
        }
        
        //输出登录页面
        return $this->render('login', [
            'model' => $model,
            'error'=>$error
        ]);
    }    
    
    /**
     * 扫码登录页面
     * @return mixed
     */
    public function actionScanLogin()
    {      
        $appid="wx5d218f0a42839363";
        $tokenId=uniqid();
        $url="http://ppwing.gicp.net/wechat.php/main-wechat/ver-scan?scanToken=".$tokenId;        
        $authUrl=  WechatAuthUrl::getAuthUrl($appid,$url);   
        echo $authUrl;
        
        //输出登录页面
        return $this->render('scan-login');        
    }
    
    /**
     * Summary of actionScanImg  返回扫码
     */
    public function actionScanImg()
    {
        $seesion=Yii::$app->session;      
        
        $appid="wx5d218f0a42839363";
        $tokenId=uniqid();
        $url="http://ppwing.gicp.net/wechat.php/main-wechat/ver-scan?scanToken=".$tokenId;        
        $authUrl=  WechatAuthUrl::getAuthUrl($appid,$url);   
        //登录Token
        $seesion["scanLoginToken"]=$tokenId;
        //存储验证token值
        $modelScanLogin=new ScanLogin();
        $modelScanLogin->token=$tokenId;        
        $modelScanLogin->addtime=time();
        $modelScanLogin->save();       
        //删除过期Token
        $timeLag=60*30;//半小时过期
        ScanLogin::deleteAll(["<","addtime",time()-$timeLag]);        
        //返回扫描登录二维码
        QrCode::png($authUrl);
    }

   
    /**
     * Summary of actionAjaxScanLogin  异步判断扫码状态
     * @return mixed
     */
    public function actionAjaxScanLogin()
    {
        $result=new BaseAPI();
        if(Yii::$app->request->isPost)
        {
            $seesion=Yii::$app->session;           
            $result->status=0;        
            $arrayRe=array();
            if(isset( $seesion["scanLoginToken"]))
            {
                $arrayRe["scanToken"]=$seesion["scanLoginToken"];
                //查询扫码状态
                $modelScanLogin=ScanLogin::find()->where(['token'=>$arrayRe["scanToken"],'status'=>10])->one();
                //暂时不验证微信关联
                if(!empty($modelScanLogin))
                {
                    $arrayRe["scanStatus"]=1;
                }else
                {
                    $arrayRe["scanStatus"]=0;
                }           
            }else
            {
                $arrayRe["scanToken"]='';
                $arrayRe["scanStatus"]=0;
                
            }
            $result->data=$arrayRe;
        }
        
        return $result->toJson();
    }
    
    
    
    /**
     * Logs out the current user.  退出登录
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    

    /**
     * Signs user up.
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }


}
