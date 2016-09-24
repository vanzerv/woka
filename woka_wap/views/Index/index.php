<?php

$this->title = 'WOKA_拯救不任性';
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
                        <a href="/index.php/subindex/index" target="wokam_content">
                            <i class="icon-disc icon text-success"></i>
                            <span class="font-bold">后台首页</span>
                        </a>
                    </li>              
                     <li>
                        <a href="/index.php/submember/index" target="wokam_content">
                            <i class="icon-list icon text-success"></i>
                            <span class="font-bold">用户管理</span>
                        </a>
                    </li>
                 
                    <li class="m-b hidden-nav-xs"></li>
                  </ul>
                  <ul class="nav" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      用户管理
                    </li>
                    <li >
                        <a href="javascript:void();" class="auto" target="wokam_content">
                            <span class="pull-right text-muted">
                                <i class="fa fa-angle-left text"></i>
                                <i class="fa fa-angle-down text-active"></i>
                            </span>
                            <i class="icon-screen-desktop icon">
                            </i>
                            <span>用户管理</span>
                        </a>
                      <ul class="nav dk text-sm">
                        <li >
                            <a href="/index.php/submember/index" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>用户列表</span>
                            </a>
                        </li>
                        <li >
                            <a href="/index.php/submember/create" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>添加用户</span>
                            </a>
                        </li>
                        <li >
                            <a href="/index.php/submemberauth/index" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>用户认证</span>
                            </a>
                        </li>
                      </ul>
                    </li>                 
                  </ul>
                  <ul class="nav text-sm" data-ride="collapse">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">                           
                            内容管理
                        </li>
                        <li>
                            <a href="javascript:void();" class="auto">
                                <span class="pull-right text-muted">
                                    <i class="fa fa-angle-left text"></i>
                                    <i class="fa fa-angle-down text-active"></i>
                                </span>
                                <i class="icon-music-tone icon right">                                  
                                </i>                              
                                <span>内容管理</span>
                            </a>
                            <ul class="nav dk text-sm" >
                             <li >
                            <a href="/index.php/subinfoclass/index" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>分类管理</span>
                            </a>
                        </li>
                                  <li >
                            <a href="javascript:void();" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>内容管理</span>
                            </a>
                        </li>    
                                   <li >
                            <a href="javascript:void();" class="auto" target="wokam_content">
                                <i class="fa fa-angle-right text-xs"></i>
                                <span>添加文章</span>
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
                  <?php   if(! Yii::$app->user->isGuest){?>
                    <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="/themes/wokacms/images/a0.jpg" alt="...">
                        <i class="on b-black"></i>
                      </span>                      
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                      <li>
                        <span class="arrow bottom hidden-nav-xs"></span>
                        <a href="javascript:void();" target="wokam_content">设置</a>
                      </li>
                      <li>
                        <a href="/index.php/subpersonal/index" target="wokam_content">个人中心</a>
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
                        <a href="/index.php/index/logout"  >退出</a>
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
                                <a href="/index.php/index/login">登陆</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li>
                                <a href="/index.php/index/signup">注册</a>
                            </li>             
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
                  <iframe src="/index.php/subindex/index" name="wokam_content" style="height:100%;width:100%;border:0px;min-height:500px;" >
                      
                  </iframe>             
              </section>
            </section>
            <!-- side content -->
            <aside class="aside-md bg-light dk" id="sidebar">
              <section class="vbox animated fadeInRight">
                <section class="w-f-md scrollable hover">
                  <h4 class="font-thin m-l-md m-t">管理员列表</h4>
                  <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="/themes/backend/images/a0.jpg" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="javascript:void();">wokam官方账号</a></div>
                        <small class="text-muted">V:WOKAM</small>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="/themes/backend/images/a0.jpg" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                      <div class="clear">
                        <div><a href="javascript:void();">wokav</a></div>
                        <small class="text-muted">V:自由开发者</small>
                      </div>
                    </li>                  
                  
                  </ul>
                </section>
                <footer class="footer footer-md bg-black">
                  <form class="" role="search">
                    <div class="form-group clearfix m-b-none">
                      <div class="input-group m-t m-b">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="搜索...">
                      </div>
                    </div>
                  </form>
                </footer>
              </section>              
            </aside>
            <!-- / side content -->
          </section>
          <a href="javascript:void();" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>