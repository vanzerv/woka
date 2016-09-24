<?php
namespace wokaextend;
use Yii;
use yii\web\Controller;
use wokav\ApiStructure\SRTC_api;
/**
 * Summary of APIController
 * @deprec 外部接口处理
 * @author Vanzer | WOKAV
 * @version Ver 0.0.1
 */
class APIController extends Controller
{
    public $_str_api;    
    /**
     * Summary of init
     * 初始化
     */
	public function init()
	{
		parent::init();		
        $this->layout=false;  
        $this->_str_api=new SRTC_api();
	}
    
    //执行前清除之自带的post安全验证处理
    public function beforeAction($action)
    {
        //验证是否为测试环境
        if(!\Yii::$app->params['apidebug'])
        {
            //验证非post请求返回错误
            if (!\Yii::$app->request->isPost) {        
                $this->_str_api->status=101;
                $this->_str_api->message='非POST请求';    
                $this->afterAction($action,null);
            }        
        }         
        return true;
    }
    //行为执行后输出
    public function afterAction($action, $result)
    {
        $this->_str_api->tojson();    
    }
    //设置返回的数据
    function set_result($code=102,$message="成功！",$data=null)
    {
        $this->_str_api->status=$code;
        $this->_str_api->message=$message;
        $this->_str_api->data=$data;       
    }      
}