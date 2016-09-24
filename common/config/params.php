<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'frontend_pwdPrefix'=>'fwokavz',
    'backend_pwdPrefix'=>'bwokavz',
    //单用户功能模式
    'mainWechat'=>[
         'wechatUrl'=>'http://ppwing.gicp.net/wechat.php/wechat/wechat',
         'encodingAesKey'=>'9eN3SJC2rvY6TVZf8EmFDdpC00G7KiKN5KfY6OFbEcF',
         'wechatMain'=>'gh_076030030fef',
          'wechatToken'=>'wokav',//微信Token值
         'wchatAPPID'=>'wx5d218f0a42839363', //微信用户ID
         'wechatAPPSecret'=>'5633d984babe762d6c5876b1f662a54b',//APP安全字符串
    ]    ,
      'ordertype1'=>[
         '0'=>'全部',
         
        '1'=>"已经下单",

        '2'=>'分配订单',

        '3'=>'结束订单'
        
    ],
    //类型
    'invoices'=>[
      '0'=>'全部',
      '1'=>'文件票件',
      '2'=>'电子产品',
      '3'=>'衣物',
      '4'=>'食品',
      '5'=>'工艺品',
      '6'=>'书籍',
      '7'=>'玩具乐器',
      '8'=>'贵重品',
      '9'=>'化妆品',
      '10'=>'办公用品',
      '11'=>'其他',    
    ]
];
