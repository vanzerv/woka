<?php

namespace wokav\ApiStructure;
use yii\base\Object;
use yii\helpers\Json;
/**
 * Summary of SRTC_sysmessagehome
 * auth:Vanzer
 * des:真蛋疼 
 * date: 2015年12月3日
 */
class SRTC_sysmessagehome  extends Object
{
    public $status=1;
    public $messag='';
    public $data=array();
    
    function __construct()
    {        
    }   
    
    //转换为json格式 输出
    public function tojson()
    {
        echo Json::encode($this);
        exit;
    }    
}
