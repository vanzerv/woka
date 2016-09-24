<?php
namespace wokaextend\wechat;


class TemplateMessage{

    /**
     * 设置所属行业
     * $industryId1 公众号模板消息所属行业编号 请打开连接查看行业编号 http://mp.weixin.qq.com/wiki/17/304c1885ea66dbedf7dc170d84999a9d.html#.E8.AE.BE.E7.BD.AE.E6.89.80.E5.B1.9E.E8.A1.8C.E4.B8.9A
     * $industryId2 公众号模板消息所属行业编号
     */
    public static function setIndustry($industryId1, $industryId2){
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token='.AccessToken::getAccessToken();
        $queryAction = 'POST';
        $template = array();
        $template['industry_id1'] = "$industryId1";
        $template['industry_id2'] = "$industryId2";
        $template = json_encode($template);
        return Curl::callWebServer($queryUrl, $template, $queryAction);
    }

    /**
     * 获得模板ID
     * $templateIdShort 模板库中模板的编号，有“TM**”和“OPENTMTM**”等形式
     * @return array("errcode"=>0, "errmsg"=>"ok", "template_id":"Doclyl5uP7Aciu-qZ7mJNPtWkbkYnWBWVja26EGbNyk")  "errcode"是0则表示没有出错
     */
    public static function getTemplateId($templateIdShort){
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token='.AccessToken::getAccessToken();
        $queryAction = 'POST';
        $template = array();
        $template['template_id_short'] = "$templateIdShort";
        $template = json_encode($template);
        return Curl::callWebServer($queryUrl, $template, $queryAction);
    }

    /**
     * 向用户推送模板消息
     * @param $data = array(
     *                  'first'=>array('value'=>'您好，您已成功消费。', 'color'=>'#0A0A0A')
     *                  'keynote1'=>array('value'=>'巧克力', 'color'=>'#CCCCCC')
     *                  'keynote2'=>array('value'=>'39.8元', 'color'=>'#CCCCCC')
     *                  'keynote3'=>array('value'=>'2014年9月16日', 'color'=>'#CCCCCC')
     *                  'keynote3'=>array('value'=>'欢迎再次购买。', 'color'=>'#173177')
     * );
     * @param $touser 接收方的OpenId。
     * @param $templateId 模板Id。在公众平台线上模板库中选用模板获得ID
     * @param $url URL
     * @param string $topcolor 顶部颜色， 可以为空。默认是红色
     * @return array("errcode"=>0, "errmsg"=>"ok", "msgid"=>200228332} "errcode"是0则表示没有出错
     * 注意：推送后用户到底是否成功接受，微信会向公众号推送一个消息。
     */
    public static function sendTemplateMessage($data, $touser, $templateId, $url, $topcolor='#FF0000'){
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.AccessToken::getAccessToken();
        $queryAction = 'POST';
        $template = array();
        $template['touser'] = $touser;
        $template['template_id'] = $templateId;
        $template['url'] = $url;
        $template['topcolor'] = $topcolor;
        $template['data'] = $data;
        $template = json_encode($template);
        return Curl::callWebServer($queryUrl, $template, $queryAction);
    }
}