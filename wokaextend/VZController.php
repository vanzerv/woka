<?php
namespace wokaextend;
use Yii;
use yii\web\Controller;

class VZController extends Controller
{
    

	public function init()
	{
		parent::init();		
		 $this->layout=false;     
	}
    
   public function beforeAction($action)
   {
       return true;
   }
  
}