<?php
namespace wokav\Vextend;
/**
 * Summary of Timebase
 * auth:Vanzer
 * date:2015年12月3日
 */
class Timebase
{
    /**
     * Summary of Int_passTime
     * @param mixed $begintime 
     * @param mixed $endtime 
     * @return mixed
     */
   public static  function  Int_passTime($begintime, $endtime)
    {
        return  $endtime-$begintime ;
    }
    
    /**
     * Summary of Str_passTime
     * @param mixed $begintime 
     * @param mixed $endtime 
     * @return mixed
     */
   public static  function Str_passTime($begintime,$endtime)
    {
        $str_result='';       
        $_pass= self::Int_passTime($begintime,$endtime);
        if($_pass>=0)
        {
            if($_pass<10)
            {
                $str_result='刚刚';
            }else if($_pass<60)
            {
                $str_result=intval($_pass).'秒以前'; 
            }else if($_pass<3600)
            {
                $str_result=intval($_pass/60).'分钟以前'; 
            }else if($_pass<86400)
            {
                $str_result=intval($_pass/3600).'小时以前'; 
            }  else if($_pass<2592000)
            {
                $str_result=intval($_pass/86400).'天以前'; 
            } else 
            {
                $str_result=intval($_pass/2592000).'月以前'; 
            }            
        }else
        {
            
            return '时间错误！';
        }
        return $str_result;
    }
    
}