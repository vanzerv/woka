<?php
use yii\helpers\Url;
$this->title = 'WOKA_微信';
?>
  <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk nav-xs aside hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav bg clearfix">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                     常用功能
                    </li>
                    <li>
                        <a href="<?php echo Url::toRoute('subindex/index');?>" target="wokam_content">
                            <i class="icon-disc icon text-success"></i>
                            <span class="font-bold">后台首页</span>
                        </a>
                    </li>              
                     <li>
                        <a href="<?php echo Url::toRoute('wechat-users/index');?>" target="wokam_content">
                            <i class="icon-list icon text-success"></i>
                            <span class="font-bold">微信用户管理</span>
                        </a>
                    </li>
                 
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                  <ul class="nav" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      蜗咖网络
                    </li>
                    <li >
                        <a href="javascript:void();" class="auto" target="wokam_content">
                            <span class="pull-right text-muted">
                                <i class="fa fa-angle-left text"></i>
                                <i class="fa fa-angle-down text-active"></i>
                            </span>
                            <i class="icon-screen-desktop icon">
                            </i>
                            <span>内容管理</span>
                        </a>
                      <ul class="nav dk text-sm">
                        <li >
                            <a href="<?php echo Url::toRoute('wechat-users/index');?>" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>用户列表</span>
                            </a>
                        </li>
                      
                      </ul>
                    </li>                 
                  </ul>
                
                </nav>
                <!-- / nav -->
              </div>
            </section>            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
                  <?php   if(! Yii::$app->admin->isGuest){?>
                    <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="/themes/backend/images/a0.jpg" alt="...">
                        <i class="on b-black"></i>
                      </span>                      
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                      <li>
                        <span class="arrow bottom hidden-nav-xs"></span>
                        <a href="javascript:void();" target="wokam_content">设置</a>
                      </li>
                      <li>
                        <a href="javascript:void();" target="wokam_content">个人中心</a>
                      </li>
                      <li>
                        <a href="javascript:void();">
                          <span class="badge bg-danger pull-right">0</span>
                          条通知
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void();">帮助</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="<?php echo Url::toRoute('index/logout');?>"  >退出</a>
                      </li>
                    </ul>
                  </div>

                  <?php }else { ?>
        
          <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="/themes/backend/images/a0.jpg" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>                      
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                     <li>
                                <span class="arrow top"></span>
                                <a href="<?php echo Url::toRoute('index/login');?>">登陆</a>
                            </li>                            
                            <li class="divider"></li>                                     
                    </ul>
                  </div>
        
        <?php } ?>

                
                </div>            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                  <iframe src="<?php echo Url::toRoute('subindex/index');?>" name="wokam_content" style="height:100%;width:100%;border:0px;min-height:500px;" >
                  </iframe>             
              </section>
            </section>
            <!-- side content -->
           
            <!-- / side content -->
          </section>
        </section>
      </section>