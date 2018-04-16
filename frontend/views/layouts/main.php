<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="iDea a Bootstrap-based, Responsive HTML5 Template">
    <meta name="author" content="htmlcoder.me">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <?php $this->head() ?>
    <script type="text/javascript" src="/js/html5shiv.js"></script>
    <script type="text/javascript" src="/js/selectivizr.js"></script>
</head>
<?php $this->beginBody() ?>
<body class="front">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">

    <!-- header-top start -->
    <!-- ================ -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-2 col-sm-6">

                </div>
                <div class="col-xs-10 col-sm-6">

                    <!-- header-top-second start -->
                    <!-- ================ -->
                    <div id="header-top-second"  class="clearfix">

                        <!-- header top dropdowns start -->
                        <!-- ================ -->
                        <div class="header-top-dropdown">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn" onclick="javascript:window.location.href='<?=Url::toRoute(['site/index', 'lang'=>'zh-cn'])?>';"> 中文</button>
                                <button type="button" class="btn" onclick="javascript:window.location.href='<?=Url::toRoute(['site/index', 'lang'=>'en'])?>';"> English</button>
                            </div>
                        </div>
                        <!--  header top dropdowns end -->

                    </div>
                    <!-- header-top-second end -->

                </div>
            </div>
        </div>
    </div>
    <!-- header-top end -->

    <!-- header start (remove fixed class from header in order to disable fixed navigation mode) -->
    <!-- ================ -->
    <header class="header fixed clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3">

                    <!-- header-left start -->
                    <!-- ================ -->
                    <div class="header-left clearfix">

                        <!-- logo -->
                        <div class="logo">
                            <a href="<?=Url::toRoute('site/index')?>"><img id="logo" src="images/logo_red.png" alt="iDea"></a>
                        </div>

                        <!-- name-and-slogan -->
                        <div class="site-slogan">

                        </div>

                    </div>
                    <!-- header-left end -->

                </div>
                <div class="col-md-9">

                    <!-- header-right start -->
                    <!-- ================ -->
                    <div class="header-right clearfix">

                        <!-- main-navigation start -->
                        <!-- ================ -->
                        <div class="main-navigation animated">

                            <!-- navbar start -->
                            <!-- ================ -->
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">

                                    <!-- Toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <?php foreach($this->params['navList'] as $val){?>
                                                <li <?php if($this->params['cur_ctrl_act'] == substr($val['nav_url'], 0, strlen($this->params['cur_ctrl_act']))){?> class="active"<?php } ?>>
                                                    <a href="<?=Url::toRoute($val['nav_url'])?>"><?=Yii::t('app', $val['nav_name'])?></a>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <?php if(!Yii::$app->session->get('cust')){?>
                                                    <a href="#" data-toggle="modal" data-target="#loginModal"><?=Yii::t('app', '登录/注册')?></a>
                                                <?php }else{ ?>
                                                    <div style="line-height:45px;">
                                                        <span onclick="javascript:window.location.href='<?=Url::toRoute('member/index')?>'" style="cursor: pointer;">
                                                            <?=Yii::$app->session->get('cust')['cust']?>
                                                        </span> /
                                                        <span onclick="javascript:window.location.href='<?=Url::toRoute('site/logout')?>'" style="cursor: pointer;"><?=Yii::t('app', '退出')?></span>
                                                    </div>
                                                <?php } ?>
                                            </li>
                                            <!-- mega-menu end -->
                                        </ul>
                                    </div>

                                </div>
                            </nav>
                            <!-- navbar end -->

                        </div>
                        <!-- main-navigation end -->

                    </div>
                    <!-- header-right end -->

                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <?=$content?>


    <!-- footer start (Add "light" class to #footer in order to enable light footer) -->
    <!-- ================ -->
    <footer id="footer">

        <!-- .footer start -->
        <!-- ================ -->
        <div class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="images/logo_red_footer.png" alt=""></div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p><?=$this->params['_company_about']?></p>
                                    <ul class="social-links circle">
                                        <li class="facebook"><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="skype"><a target="_blank" href="#"><i class="fa fa-skype"></i></a></li>
                                        <li class="linkedin"><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-content">
                            <div class="logo-footer"><h2><?=Yii::t('app', '联系我们')?></h2></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-icons">
                                        <li><i class="fa fa-phone pr-10"></i> <?=Yii::t('app', '客服电话：')?><?=$this->params['_cust_serv_tel']?></li>
                                        <li><i class="fa fa-envelope-o pr-10"></i> <?=Yii::t('app', '技术支持：')?><?=$this->params['_support_em']?></li>
                                        <li><i class="fa fa-envelope-o pr-10"></i> <?=Yii::t('app', '客户服务：')?><?=$this->params['_cust_serv_em']?></li>
                                        <li><i class="fa fa-fax pr-10"></i> <?=Yii::t('app', '客服QQ：')?><?=$this->params['_site_serv_qq']?></li>
                                        <li><i class="fa fa-fax pr-10"></i> <?=Yii::t('app', '官方QQ群：')?><?=$this->params['_site_qq']?></li>
                                        <li><i class="fa fa-map-marker pr-10"></i> <?=$this->params['_company_addr']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-bottom hidden-lg hidden-xs"></div>
            </div>
        </div>
        <!-- .footer end -->

        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright &copy; 2017.所有权归<?=$this->params['_company_name']?>. 备案号<?=$this->params['_site_record_num']?></p>
                    </div>
                    <div class="col-md-6">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse-2">
                                <ul class="nav navbar-nav">
                                    <?php foreach($this->params['navList'] as $val){?>
                                        <li>
                                            <a href="<?=Url::toRoute($val['nav_url'])?>"><?=Yii::t('app', $val['nav_name'])?></a>
                                        </li>
                                    <?php } ?>
                                    <li><a href="<?=Url::toRoute(['site/about', 'id' => 2])?>">About Us</a></li>
                                    <li><a href="<?=Url::toRoute(['site/contact', 'id' => 1])?>">Contact us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- .subfooter end -->

    </footer>
    <!-- footer end -->

    <?php if(!Yii::$app->session->get('cust')){?>
        <?php include('mem.modal.php'); ?>
    <?php } ?>

</div>
<!-- page-wrapper end -->

<!-- JavaScript files placed at the end of the document so the pages load faster
================================================== -->
<!-- Jquery and Bootstap core js files -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


