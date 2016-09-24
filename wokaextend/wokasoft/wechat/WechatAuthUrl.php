<?php
namespace wokaextend\wokasoft\wechat;
use Yii;


class WechatAuthUrl
{
    /**
     * Summary of getAuthUrl  返回微信认证Url
     * @param mixed $appid  公众号APPID
     * @param mixed $url  要访问的Url
     * @return mixed
     */
    public static function getAuthUrl($appid,$url)
    {
        $_re_urel="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid;
        $_re_urel.="&redirect_uri=".urlencode($url)."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
       
        return $_re_urel;
    }
    
}