<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta content="telephone=no" name="format-detection">
    <title>我的地址簿</title>

    <script src="/js/jquery.js"></script>
    <script src="/js/wx.global.js"></script>
    <script type="text/javascript" src="/js/dateFormat.js"></script>
    <script type="text/javascript" src="/js/paging.js"></script>
    <script type="text/javascript" src="/js/address_manage.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/new_order_list.css">
    <link rel="stylesheet" href="/css/addSender.css">
    <style type="text/css">
        body {
            background-color: white;
        }
    </style>
</head>
<body>
    <div data-role="page" id="address_manage" class="first-show" style="position:relative;overflow-x:hidden">
        <div class="pheader" data-role="header">
            <div class="titleUtil"></div>
            <div class="title_bar">
                <span onclick="history.back();" class="back">
                    <span class="back_img"><img src="/img/top_arrow.png"></span>
                    <span class="back_text">返回</span>
                </span>
                <span class="title" id="my_address">我的地址簿</span>
                <span id="add_address" style="position: absolute;right: 24px;top:0px;text-shadow:none" onclick="addAddressLoad();">新增</span>
            </div>
            <ul class="tabs-half">
                <li id="sender" class="actived tab1" style="text-shadow:none">寄件人地址<span class="num1"></span></li>
                <li id="receiver" class="right tab2" style="text-shadow:none">收件人地址<span class="num2"></span></li>
            </ul>
        </div>
        <div data-role="content">
            <div id="dg" class="mobile-datagrid" style="margin-bottom:5%" data-none-tip="暂无地址信息">
                 <p style="font-size:0.75em;color:gray; width:100%;text-align:center;">点击右上角添加地址</p>          
            </div>           
        </div>
    </div>
    <div data-role="page" id="address_load" class="second-show">
        <div class="pheader" data-role="header" data-position="fixed" data-tap-toggle="false">
            <div class="titleUtil"></div>
            <div class="title_bar">
                <span onclick="init_page('#address_manage');" class="back re_address_manage">
                    <span class="back_img"><img src="/img/top_arrow.png"></span>
                    <span class="back_text">返回</span>
                </span>
                <span class="title" id="address_title">修改地址</span>
            </div>
        </div>
        <div data-role="content" class="addsender_c">
            <div class="blank"></div>
            <div id="addsender_name" class="property weight_pre">
                <span class="sender-label">姓名</span>
                <input id="address_load_name" class="sender-info" placeholder="姓名" maxlength="10" data-role="none" value="王屹">
            </div>
            <div id="addsender_connect" class="property weight_pre">
                <span class="sender-label">联系方式</span>
                <input class="sender-info" data-role="none" type="text" maxlength="13" id="address_load_tel" placeholder="手机号码或固定电话">
            </div>
            <div id="connecter" style="display:none">
                <img src="/img/connecter.png">
                <br>
            </div>
            <div id="addsender_area" class="property weight_pre">
                <span class="sender-label">所在地区</span>
                <input id="other_prov" class="sender-info" data-role="none"  value="上海市,上海市,青浦区" readonly="readonly" style="cursor:pointer">
            </div>
            <div id="location" check="can">
                <a href="javascript:void(0);"><img style="height: 2em;margin-top: 0.45em;" src="/img/location.png"></a>
            </div>
            <div id="small_address" class="property">
                <span class="sender-label">详细地址</span>
                <textarea id="address_load_address" class="sender-detail" rows="2" data-role="none" placeholder="镇、街道、详细地址">手机号码或固</textarea>
            </div>
            <div class="blank_1"></div>
            <div id="express_type" class="property">
                <span class="hehe" id="default_address">设置为默认地址</span>
                <div class="btn-switch" data-role="none">
                    <input type="checkbox" data-role="none" checked="true" id="switch1">
                    <label for="switch1" data-role="none"><span data-role="none"></span></label>
                </div>
                <input id="contactId" style="display: none;">
                <input id="isDefault" style="display: none;">
            </div>
            <div class="blank_4">
                <div id="submit_com" onclick="setAddressInterface(this)">
                    完&nbsp;&nbsp;成
                </div>
            </div>
        </div>
    </div>
    <div class="fakeloader"></div>
    <div data-role="page" id="prov" class="second-show">
        <div class="pheader" data-role="header">
            <div class="title_bar">
                <span onclick="init_page(';#address_load';);" class="back re_address_prefix">
                    <span class="back_img"><img src="/img/top_arrow.png"></span>
                    <span class="back_text">返回</span>
                </span>
                <span class="title selectBig">选择省</span>
            </div>
        </div>
        <div class="city_list" id="provlist">
        </div>
    </div>
    <div data-role="page" id="city" class="second-show">
        <div class="pheader" data-role="header" data-position="fixed" data-tap-toggle="false">
            <div class="titleUtil"></div>
            <div class="title_bar">
                <span onclick="init_page(';#prov';);" class="back re_address_prefix">
                    <span class="back_img"><img src="/img/top_arrow.png"></span>
                    <span class="back_text">返回</span>
                </span>
                <span class="title selectBig">选择市</span>
            </div>
        </div>
        <div class="city_list" id="citylist">
        </div>
    </div>

    <div data-role="page" id="county" class="second-show">
        <div class="pheader" data-role="header" data-position="fixed" data-tap-toggle="false">
            <div class="titleUtil"></div>
            <div class="title_bar">
                <span onclick="init_page(';#city';);" class="back re_address_prefix">
                    <span class="back_img"><img src="/img/top_arrow.png"></span>
                    <span class="back_text">返回</span>
                </span>
                <span class="title selectBig">选择县区</span>
            </div>
        </div>
        <div class="city_list" id="countylist">
        </div>
    </div>

</body>
</html>