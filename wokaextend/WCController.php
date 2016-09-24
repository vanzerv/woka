<?php
namespace wokaextend;
use Yii;
use yii\web\Controller;
/**
 * Summary of WCController 微信控制器，去除yii自带post安全验证
 */
class WCController extends Controller
{   
	/**
	 * Summary of init  初始化，不启用模版
	 */
	public function init()
	{
		parent::init();		
		$this->layout=false;        
	}    
   /**
    * Summary of beforeAction  去除数据提交安全验证
    * @param mixed $action 
    * @return mixed
    */
   public function beforeAction($action)
   {
       return true;
   }
  
}