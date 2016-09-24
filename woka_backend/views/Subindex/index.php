<?php
use yii\helpers\Url;
$this->title = 'WOKA';
?>  

<section class="vbox">   
    <section>
      <section class="hbox stretch">    
        <section id="content">
          <section class="vbox">
        <section class="scrollable wrapper">
          <p><strong>首页</strong> (WOKAV0.0.1)</p>
          <div class="row">
            <div class="col-sm-6 portlet">
              <section class="panel panel-info portlet-item">
                <header class="panel-heading">
                 快捷链接
                </header>
                <div class="list-group bg-white">
                  <a href="<?php echo Url::toRoute('wechat-users/index');?>" class="list-group-item">
                    <i class="fa fa-fw fa-envelope"></i> 微信用户管理
                  </a>                 
                </div>
              </section>
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">
                  <ul class="nav nav-pills pull-right">
                    <li>
                      <a href="javascript:void();" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                  </ul>
                  更新版本说明 <span class="badge bg-info">1</span>                    
                </header>
                <section class="panel-body">
                  <article class="media">
                    <div class="pull-left">
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-bold fa-stack-1x text-white"></i>
                      </span>
                    </div>
                    <div class="media-body">                        
                      <a href="http://www.wokawoka.com" class="h4">WOKAV</a>
                      <small class="block m-t-xs">wokaBase微信基础框架</small>
                      <em class="text-xs">更新时间： <span class="text-danger">2016.1.21</span></em>
                    </div>
                  </article>
                  <div class="line pull-in"></div>
              
                </section>
              </section>
            </div>
            <div class="col-sm-6 portlet">
              <section class="panel panel-success portlet-item">
                <header class="panel-heading">
                  操作日志
                </header>
                <ul class="list-group alt">
              <!--    <li class="list-group-item">
                    <div class="media">
                         <div class="pull-right text-success m-t-sm">
                        <i class="fa fa-circle"></i>
                      </div>
                      <div class="media-body">
                        <div><a href="javascript:void();">添加管理员admin</a></div>
                        <small class="text-muted">1分钟前</small>
                      </div>
                    </div>
                  </li>
                -->
                </ul>
              </section>
              <section class="panel panel-default portlet-item">
                <header class="panel-heading">                    
                  <span class="label bg-dark">15</span> 客户反馈
                </header>
              <!--  <section class="panel-body">
                  <article class="media">
                    <span class="pull-left thumb-sm"><img src="images/a1.png" alt="..." class="img-circle"></span>
                    <div class="media-body">
                      <div class="pull-right media-xs text-center text-muted">
                        <strong class="h4">2016.01.21</strong><br>                        
                      </div>
                      <a href="javascript:void();" class="h4">紧急问题</a>
                      <small class="block"><a href="javascript:void();" class="">用户1</a> <span class="label label-success">处理</span></small>
                      <small class="block m-t-sm">
                          平台密码忘记了怎么办？
                      </small>
                    </div>
                  </article>
                  <div class="line pull-in"></div>
                  <article class="media">
                    <span class="pull-left thumb-sm"><i class="fa fa-file-o fa-3x icon-muted"></i></span>                
                    <div class="media-body">
                      <div class="pull-right media-xs text-center text-muted">
                        <strong class="h4">2016.01.21</strong><br>
                       
                      </div>
                      <a href="javascript:void();" class="h4">我想申请个账号</a>
                      <small class="block"><a href="javascript:void();" class="">用户1</a> <span class="label label-info">去处理</span></small>
                      <small class="block m-t-sm">我想申请个账号.</small>
                    </div>
                  </article>
                  <div class="line pull-in"></div>
         
                </section>    -->
              </section>    
            </div>
          </div>
        </section>
      </section>      
        </section>
      </section>
    </section>    
  </section>