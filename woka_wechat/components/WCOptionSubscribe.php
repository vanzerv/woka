<?php
namespace  wechat\components;

use  wokaextend\wechat\ResponsePassive;
use  wechat\components\CWechatUser;
/**
 * 关注操作消息分发实际处理类
 * @author vanzer
 *  date:2016-08-18 02:22:56
 */
class WCOptionSubscribe{

    /**
     * @descrpition 普通关注
     * @param $request
     * @return array
     */
    public static function eventSubscribe(&$request){
        //保存||更新关注用户信息
       $content1=  CWechatUser::saveUserInfoByOpenid($request['fromusername']);
        $content = $request['tousername']. '欢迎您关注我们的微信，将为您竭诚服务（普通关注）'.$request['fromusername'].$content1;
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

    /**
     * @descrpition 扫描二维码关注（未关注时）
     * @param $request
     * @return array
     */
    public static function eventQrsceneSubscribe(&$request){
     //保存||更新关注用户信息
       CWechatUser::saveUserInfoByOpenid($request['fromusername']);
        $content = '欢迎您关注我们的微信，将为您竭诚服务(二维码关注)';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }


    /**
     * @descrpition 取消关注
     * @param $request
     * @return array
     */
    public static function eventUnsubscribe(&$request){
        $content = '为什么不理我了？';
        return ResponsePassive::text($request['fromusername'], $request['tousername'], $content);
    }

}
