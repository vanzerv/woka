<?php
namespace  wechat\components;

use  wokaextend\wechat\ResponsePassive;
use  wechat\components\CWechatUser;

/**
 *微信消息分发处理类
 * @author vanzer
 *  date:2016-08-18 02:22:56
 */
class CWechatResponse{
    /**
     * @descrpition 分发请求
     * @param $request
     * @return array|string
     */

    public static function switchType(&$request){
        $data = array();
        if(empty($request['msgtype']))
        {
            //默认文本消息
           $request['msgtype']='text';
        }
        switch ($request['msgtype']) {
            //事件
            case 'event':
                $request['event'] = strtolower($request['event']);
                switch ($request['event']) {
                    //关注
                    case 'subscribe':
                        //二维码关注
                        if(isset($request['eventkey']) && isset($request['ticket'])){
                            $data = WCOptionSubscribe::eventQrsceneSubscribe($request);  //微信关注处理
                        //普通关注
                        }else{
                            $data = WCOptionSubscribe::eventSubscribe($request);  //微信关注处理
                        }
                        break;
                    //扫描二维码
                    case 'scan':
                        $data = WCOptionSpecial::eventScan($request);
                        break;
                    //地理位置
                    case 'location':
                        $data = WCOptionSpecial::eventLocation($request);
                        break;
                    //自定义菜单 - 点击菜单拉取消息时的事件推送
                    case 'click':
                        $data = WCOptionMenu::eventClick($request);
                        break;
                    //自定义菜单 - 点击菜单跳转链接时的事件推送
                    case 'view':
                        $data = WCOptionMenu::eventView($request);
                        break;
                    //自定义菜单 - 扫码推事件的事件推送
                    case 'scancode_push':
                        $data = WCOptionMenu::eventScancodePush($request);
                        break;
                    //自定义菜单 - 扫码推事件且弹出“消息接收中”提示框的事件推送
                    case 'scancode_waitmsg':
                        $data = WCOptionMenu::eventScancodeWaitMsg($request);
                        break;
                    //自定义菜单 - 弹出系统拍照发图的事件推送
                    case 'pic_sysphoto':
                        $data = WCOptionMenu::eventPicSysPhoto($request);
                        break;
                    //自定义菜单 - 弹出拍照或者相册发图的事件推送
                    case 'pic_photo_or_album':
                        $data = WCOptionMenu::eventPicPhotoOrAlbum($request);
                        break;
                    //自定义菜单 - 弹出微信相册发图器的事件推送
                    case 'pic_weixin':
                        $data = WCOptionMenu::eventPicWeixin($request);
                        break;
                    //自定义菜单 - 弹出地理位置选择器的事件推送
                    case 'location_select':
                        $data = WCOptionMenu::eventLocationSelect($request);
                        break;
                    //取消关注
                    case 'unsubscribe':
                        $data = WCOptionSubscribe::eventUnsubscribe($request);
                        break;
                    //群发接口完成后推送的结果
                    case 'masssendjobfinish':
                        $data = WCOptionSpecial::eventMassSendJobFinish($request);
                        break;
                    //模板消息完成后推送的结果
                    case 'templatesendjobfinish':
                        $data = WCOptionSpecial::eventTemplateSendJobFinish($request);
                        break;
                    default:
                        return Msg::returnErrMsg(MsgConstant::ERROR_UNKNOW_TYPE, '收到了未知类型的消息', $request);
                        break;
                }
                break;
            //文本
            case 'text':
                $data = WCOptionBase::text($request);
                break;
            //图像
            case 'image':
                $data = WCOptionBase::image($request);
                break;
            //语音
            case 'voice':
                $data = WCOptionBase::voice($request);
                break;
            //视频
            case 'video':
                $data = WCOptionBase::video($request);
                break;
            //小视频
            case 'shortvideo':
                $data = WCOptionBase::shortvideo($request);
                break;
            //位置
            case 'location':
                $data = WCOptionBase::location($request);
                break;
            //链接
            case 'link':
                $data = WCOptionBase::link($request);
                break;
            default:
                return ResponsePassive::text($request['fromusername'], $request['tousername'], '收到未知的消息，我不知道怎么处理');
                break;
        }
        return $data;
    }
}
