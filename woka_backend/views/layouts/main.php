<?php
use yii\helpers\Html;
use backend\assets\MainAsset;
MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"class="app" >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--[if lt IE 9]>
    <script src="/js/ie/html5shiv.js"></script>
    <script src="/js/ie/respond.min.js"></script>
    <script src="/js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
    <?php $this->beginBody() ?>
    <section class="vbox">
        <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
            <div class="navbar-header aside bg-info nav-xs">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                    <i class="icon-list"></i>
                </a>
                <a href="javascript:void();" class="navbar-brand text-lt">                 
                    <img src="/themes/backend/images/logo/vanzer_03.png" alt=".">
                    <span class="hidden-nav-xs m-l-sm">韵达快递</span>
                </a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                    <i class="icon-settings"></i>
                </a>
            </div>
            <ul class="nav navbar-nav hidden-xs">
                <li>
                    <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
                        <i class="fa fa-indent text"></i>
                        <i class="fa fa-dedent text-active"></i>
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control input-sm no-border rounded" placeholder="搜索内容...">
                    </div>
                </div>
            </form>
            <div class="navbar-right ">
                <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                    <li class="hidden-xs">
                        <a href="javascript:void();" class="dropdown-toggle lt" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="badge badge-sm up bg-danger count">0</span>
                        </a>
                        <section class="dropdown-menu aside-xl animated fadeInUp">
                            <section class="panel bg-white">
                                <div class="panel-heading b-light bg-light">
                                    <strong>你当前有 <span class="count">0</span> 条消息</strong>
                                </div>
                                <div class="list-group list-group-alt">
                                  
                                </div>
                                <div class="panel-footer text-sm">
                                    <a href="javascript:void();" class="pull-right"><i class="fa fa-cog"></i></a>
                                    <a href="#notes" data-toggle="class:show animated fadeInRight">查看所有通知</a>
                                </div>
                            </section>
                        </section>
                    </li>
                    <li class="dropdown">
                        <?php                        
                        if(! Yii::$app->admin->isGuest){?>
                          <a href="javascript:void();" class="dropdown-toggle bg clear" data-toggle="dropdown">
                            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                                <img src="/themes/backend/images/a0.jpg" alt="...">
                            </span>
                            <?php  echo Yii::$app->admin->identity->username; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <li>
                                <span class="arrow top"></span>
                                <a href="javascript:void();" target="wokam_content">设置</a>
                            </li>
                            <li>
                                <a href="/index.php/subpersonal/index"target="wokam_content">个人中心</a>
                            </li>
                            <li>
                                <a href="javascript:void();">
                                    <span class="badge bg-danger pull-right">0</span>
                                    条通知
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void();" target="wokam_content">帮助</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/index.php/index/logout">退出</a>
                            </li>                            
                        </ul>
                        <?php }else{ ?>                            
                          <a href="/index.php/index/login" class="dropdown-toggle bg clear" data-toggle="dropdown">
                            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                                <img src="/themes/backend/images/a0.jpg" alt="...">
                            </span> 
                            WOKA游客 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <li>
                                <span class="arrow top"></span>
                                <a href="/index.php/index/login">登陆</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li>
                                <a href="/index.php/index/signup">注册</a>
                            </li>                            
                        </ul>
                        <?php }  ?>


                      
                    </li>
                </ul>
            </div>
        </header>
        <section>
            <?= $content ?>
        </section>
    </section>


    <footer id="footer">
        <div class="text-center padder">
            <p>
                <small>POWERBY  WOKAV<br>
                    &copy; <?= date('Y') ?></small>
            </p>
        </div>
    </footer>
    <!-- / footer -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
