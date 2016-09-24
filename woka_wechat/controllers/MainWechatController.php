<?php
namespace wechat\controllers;
use Yii;
use wokaextend\WCController;
use wokaextend\wechat\Wechat;
use wokaextend\wechat\UserManage;
use wokaextend\wechat\Menu;
use wokaextend\jiesi\wechatoption;
use  common\models\wechat\user\WechatUsers;
use   wechat\components\CWechatUser;

use common\models\woka\user\ScanLogin; //扫码登录

class MainWechatController extends WCController
{
    //页面初始化-加载主微信配置
    public  function init()
    {
        define("WECHAT_URL", yii::$app->params['mainWechat']['wechatUrl']);
        define('ENCODING_AES_KEY', yii::$app->params['mainWechat']['encodingAesKey']);
        define("WECHAT_MAIN", yii::$app->params['mainWechat']['wechatMain']);
        define('WECHAT_TOKEN', yii::$app->params['mainWechat']['wechatToken']); //微信Token值
        define("WECHAT_APPID", yii::$app->params['mainWechat']['wchatAPPID']);
        define("WECHAT_APPSECRET", yii::$app->params['mainWechat']['wechatAPPSecret']);
    }

    public function actionIndex()
    {
        //微信处理接口
        $wokav_wechat=new wechat(WECHAT_TOKEN, false);
      //判断是否为微信绑定验证信息
        if(!$wokav_wechat->isValid())
        {
            echo $wokav_wechat->run();
        }else
        {
            $wokav_wechat->checkSignature();
        }
    //结束继续执行
        die();
    }
    
    /**
     * Summary of actionScanImg  返回扫码登录
     */
    public function actionVerScan()
    {
        if(isset($_GET['code']))
        {
            $modelScanLogin=ScanLogin::find()->where(["token"=>Yii::$app->request->get("scanToken")])->one();
            if($modelScanLogin)
            {
                $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.WECHAT_APPID.'&secret='.WECHAT_APPSECRET.'&code='.$_GET['code'].'&grant_type=authorization_code';
                $html = file_get_contents($url);
                $_userinfo=json_decode($html);                 
             //   $session['vanzer_openid']=$_userinfo->openid;
                //保存扫码结果 
                $modelScanLogin->status=10;
                $modelScanLogin->openid=$_userinfo->openid;
                $modelScanLogin->save();
                
            }else
            {
                echo "二维码已过期！";
                exit;
            }          
        }else
        {
            echo '获取权限错误！';
            exit;
        }
        
       
    }
    
    

    public function actionTest()
    {
        header("Content-type: text/html; charset=utf-8");

        CWechatUser::saveUserInfoByOpenid('o-u_At8UENjaf0pnq4TCX7rKzO6I');
        exit;

        $msg="用户关注通知：微信用户【154454】。关注了公众号。";
        $M_op=new wechatoption();
        $M_op->send_reg('o-u_At8UENjaf0pnq4TCX7rKzO6I');
        exit;
    }

    public function actionSendsuccess()
    {
        $M_op=new wechatoption();
        if(isset($_GET['openid']))
        {
            $M_op->reg_ver($_GET['openid']);
        }
        exit;
    }

    public function actionSetmenu()
    {
        $_re_urel="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx98674bb51de90342&redirect_uri=http%3A%2F%2Fi-jiesi.com%2Fwechat%2Fwechat.php%2Fdaili%2Findex&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        $menuList = array(
            array('id'=>'10', 'pid'=>'',  'name'=>'关于婕斯', 'type'=>'', 'code'=>'key_1'),
            array('id'=>'11', 'pid'=>'10',  'name'=>'首页', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/index/index'),
            array('id'=>'12', 'pid'=>'10',  'name'=>'最新消息', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/news/index'),
            array('id'=>'13', 'pid'=>'10',  'name'=>'奖金制度', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/jiangjin/index'),
            array('id'=>'14', 'pid'=>'10',  'name'=>'案例分享', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/case/index'),
            array('id'=>'15', 'pid'=>'10',  'name'=>'操作指南', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/option/home'),

            array('id'=>'20', 'pid'=>'',  'name'=>'婕斯产品', 'type'=>'', 'code'=>'key_2'),
            array('id'=>'21', 'pid'=>'20',  'name'=>'入会套餐', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/goods1/index'),
            array('id'=>'22', 'pid'=>'20',  'name'=>'中国区商品', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/goods/goodslist?id=28'),
            array('id'=>'23', 'pid'=>'20',  'name'=>'美国区商品', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/goods/goodslist?id=29'),

            array('id'=>'30', 'pid'=>'',  'name'=>'婕斯助手', 'type'=>'', 'code'=>'key_7'),
            array('id'=>'31', 'pid'=>'30', 'name'=>'代理注册', 'type'=>'view', 'code'=>$_re_urel),
            array('id'=>'32', 'pid'=>'30', 'name'=>'汇率查询1', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/huilv/index'),
            array('id'=>'33', 'pid'=>'30', 'name'=>'物流查询', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/wuliu/index'),
            array('id'=>'34', 'pid'=>'30', 'name'=>'常见问题', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/wenti/index'),
            array('id'=>'35', 'pid'=>'30', 'name'=>'官方客服', 'type'=>'view', 'code'=>'http://www.i-jiesi.com/wechat/wechat.php/kefu/index'),
            array('id'=>'36', 'pid'=>'30', 'name'=>'供货申请', 'type'=>'view', 'code'=>'http://gonghuo.duapp.com/wechat.php/index'),
        );
        Menu::setMenu($menuList);
        echo "y";
        exit;

    }
}
