<?php

namespace wokaextend\structure;
use yii\base\Object;
use yii\helpers\Json;
/**
 * Summary of SRTC_api
 * auth:Vanzer
 * des:真蛋疼 
 * date: 2015年12月3日
 */
class BaseAPI  extends Object
{
    public $status=1; //状态 0 无错   +0则表示对应的错误代码
    public $message='未处理值'; //消息体
    public $data=array(); //返回数据体
    //构造函数
    function __construct()
    {       
        
    }       
    //转换为json格式 输出
    public function toJson()
    {      
        header('Content-type: application/json;charset=utf-8');      
        echo Json::encode($this);
        exit;
    }    
}
