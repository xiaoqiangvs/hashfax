<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->params['publicTitle'])?><?= Html::encode($this->title) ?></title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <?php if($this->context->css){ foreach($this->context->css as $css) { ?>
        <link href="<?=$css?>" rel="stylesheet" type="text/css"/>
    <?php } } ?>
    <link href="/metronic/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/metronic/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/metronic/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/layouts/layout/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/metronic/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-footer-fixed">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="/metronic/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12条</span>订单记录</h3>
                            <a href="<?=Url::toRoute('order/index')?>">更多</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller searchList" data-type="order" data-url="<?=Url::toRoute('order/getlist')?>" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Server #12 overloaded. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Server #2 not responding. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> Application error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Database overloaded 68%. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> A user IP blocked. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </span> Storage Server #4 not responding dfdfdfd. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-info">
                                                        <i class="fa fa-bullhorn"></i>
                                                    </span> System Error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                                    <span class="label label-sm label-icon label-danger">
                                                        <i class="fa fa-bolt"></i>
                                                    </span> Storage server failed. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>你有<span class="bold">7条新</span>充值记录</h3>
                            <a href="<?=Url::toRoute('recharge/index')?>">更多</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller searchList" data-type="recharge" data-url="<?=Url::toRoute('recharge/getlist')?>" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/metronic/layouts/layout/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">Just Now </span>
                                                </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/metronic/layouts/layout/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">16 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/metronic/layouts/layout/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Bob Nilson </span>
                                                    <span class="time">2 hrs </span>
                                                </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/metronic/layouts/layout/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Lisa Wong </span>
                                                    <span class="time">40 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span class="photo">
                                                    <img src="/metronic/layouts/layout/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                                    <span class="from"> Richard Doe </span>
                                                    <span class="time">46 mins </span>
                                                </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>你有<span class="bold">12条</span>提现记录</h3>
                            <a href="<?=Url::toRoute('withdraw/index')?>">更多</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller searchList" data-type="withdraw" data-url="<?=Url::toRoute('withdraw/getlist')?>" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New release v1.2 </span>
                                                    <span class="percent">30%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Application deployment</span>
                                                    <span class="percent">65%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">65% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile app release</span>
                                                    <span class="percent">98%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">98% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Database migration</span>
                                                    <span class="percent">10%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">10% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Web server upgrade</span>
                                                    <span class="percent">58%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">58% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">Mobile development</span>
                                                    <span class="percent">85%</span>
                                                </span>
                                        <span class="progress">
                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">85% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                                <span class="task">
                                                    <span class="desc">New UI release</span>
                                                    <span class="percent">38%</span>
                                                </span>
                                        <span class="progress progress-striped">
                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">38% Complete</span>
                                                    </span>
                                                </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="/metronic/layouts/layout/img/avatar3_small.jpg" />
                        <span class="username username-hide-on-mobile"> 管理员 </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="#" data-toggle="modal" data-target='#modifyPasswdModal'>
                                <i class="icon-user"></i> 修改密码 </a>
                        </li>
                        <li class="divider"> </li>
                        <!--<li>
                            <a href="page_user_lock_1.html">
                                <i class="icon-lock"></i> 锁屏 </a>
                        </li>-->
                        <li>
                            <a href="<?=Url::toRoute('login/out')?>">
                                <i class="icon-key"></i> 注销 </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!--<li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>-->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>

        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<?php include("modifypasswd.modal.php"); ?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <!--<li class="nav-item start">
                    <a href="<?=Url::toRoute("site/index")?>" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">仪表盘</span>
                    </a>
                </li>-->
                <li class="heading">
                    <h3 class="uppercase">基本设置</h3>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='home'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("home/index")?>" class="nav-link nav-toggle">
                        <i class="icon-diamond"></i>
                        <span class="title">网站设置</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='coin'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("coin/index")?>" class="nav-link nav-toggle">
                        <i class="icon-wallet"></i>
                        <span class="title">币种管理</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='nav'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("nav/index")?>" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">导航设置</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='page'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("page/index")?>" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">页面管理</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='article'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("article/index")?>" class="nav-link nav-toggle">
                        <i class="icon-bulb"></i>
                        <span class="title">新闻资讯</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='notice'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("notice/index")?>" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">公告管理</span>
                    </a>
                </li>
                <!--<li class="nav-item <?php if(Yii::$app->controller->id=='slide'){ echo 'active';} ?>">
                    <a href="?p=" class="nav-link nav-toggle">
                        <i class="icon-wallet"></i>
                        <span class="title">幻灯片管理</span>
                    </a>
                </li>-->
                <!--
                <li class="nav-item  ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-pointer"></i>
                        <span class="title">Maps</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="maps_google.html" class="nav-link ">
                                <span class="title">Google Maps</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="maps_vector.html" class="nav-link ">
                                <span class="title">Vector Maps</span>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="heading">
                    <h3 class="uppercase">商品管理</h3>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='prod'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("prod/index")?>" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">产品列表</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='goods'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("goods/index")?>" class="nav-link nav-toggle">
                        <i class="icon-feed"></i>
                        <span class="title">商品列表</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='order'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("order/index")?>" class="nav-link nav-toggle">
                        <i class="icon-paper-plane"></i>
                        <span class="title">商品订单</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">客户信息</h3>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='cust'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("cust/index")?>" class="nav-link nav-toggle">
                        <i class="icon-basket"></i>
                        <span class="title">客户列表</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='bank'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("bank/index")?>" class="nav-link nav-toggle">
                        <i class="icon-docs"></i>
                        <span class="title">客户银行卡</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='account'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("account/index")?>" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">虚拟地址</span>
                    </a>
                </li>
                <!--<li class="nav-item <?php if(Yii::$app->controller->id=='recharge'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("recharge/index")?>" class="nav-link nav-toggle">
                        <i class="icon-social-dribbble"></i>
                        <span class="title">推荐记录</span>
                    </a>
                </li>-->
                <li class="nav-item <?php if(Yii::$app->controller->id=='recharge'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("recharge/index")?>" class="nav-link nav-toggle">
                        <i class="icon-social-dribbble"></i>
                        <span class="title">充值记录</span>
                    </a>
                </li>
                <li class="nav-item <?php if(Yii::$app->controller->id=='withdraw'){ echo 'active';} ?>">
                    <a href="<?=Url::toRoute("withdraw/index")?>" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">提现记录</span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <?= $content ?>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2017 &copy; Metronic by liuzhi.
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="/metronic/global/plugins/respond.min.js"></script>
<script src="/metronic/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/metronic/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<script src="/metronic/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

<?php if($this->context->js){ foreach($this->context->js as $js){ ?>
    <script src="<?=$js?>" type="text/javascript" charset="UTF-8"></script>
<?php } } ?>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/metronic/global/scripts/app.min.js" type="text/javascript"></script>
<script src="/metronic/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--<script src="/metronic/pages/scripts/dashboard.min.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/metronic/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="/metronic/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="/metronic/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        <?php if($this->context->initJs){ foreach($this->context->initJs as $initJs){ ?>
        <?=$initJs."\n"?>
        <?php } } ?>
        /*$('#datatable_ajax').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "index.php?r=cust/getlist"
        } );*/
        $(".searchList").each(function(){
            var url = $(this).attr('data-url');
            var type = $(this).attr('data-type');
            $(this).load(url, {length:10, start:0}, function(responseTxt,statusTxt,xhr){
                //console.log(responseTxt);
                if(type == 'order'){
                    var json = $.parseJSON( responseTxt );
                    var recordsTotal = json.recordsTotal;
                    $(this).parent().parent().prev().find('.bold').html(recordsTotal + '条新');
                    $(this).parent().parent().parent().prev().find('span').html(recordsTotal);
                    var html = '';
                    for(var i in json.data){
                        html += '<li><a href="#">' +
                                '<span class="photo">' +
                            '<img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>' +
                            '<span class="subject"><span class="from"> ' + json.data[i][3] + ' </span>' +
                            '<span class="time">' + json.data[i][8] + '</span>' +
                            '</span>' +
                            '<span class="message"> 购买' + json.data[i][5] + ' </span>' +
                            '</a>' +
                            '</li>';
                    }
                    $(this).html(html);
                }else if(type == 'recharge'){
                    var json = $.parseJSON( responseTxt );
                    var recordsTotal = json.recordsTotal;
                    $(this).parent().parent().prev().find('.bold').html(recordsTotal);
                    $(this).parent().parent().parent().prev().find('span').html(recordsTotal);
                    var html = '';
                    for(var i in json.data){
                        html += '<li><a href="#">' +
                            '<span class="photo">' +
                            '<img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>' +
                            '<span class="subject"><span class="from"> ' + json.data[i][2] + ' </span>' +
                            '<span class="time">' + json.data[i][7] + '</span>' +
                            '</span>' +
                            '<span class="message"> 充值' + json.data[i][5] + ' </span>' +
                            '</a>' +
                            '</li>';
                    }
                    $(this).html(html);
                }else if(type == 'withdraw'){
                    var json = $.parseJSON( responseTxt );
                    var recordsTotal = json.recordsTotal;
                    $(this).parent().parent().prev().find('.bold').html(recordsTotal);
                    $(this).parent().parent().parent().prev().find('span').html(recordsTotal);
                    var html = '';
                    for(var i in json.data){
                        html += '<li><a href="#">' +
                            '<span class="photo">' +
                            '<img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>' +
                            '<span class="subject"><span class="from"> ' + json.data[i][1] + ' </span>' +
                            '<span class="time">' + json.data[i][6] + '</span>' +
                            '</span>' +
                            '<span class="message"> 申请提现' + json.data[i][5] + ' </span>' +
                            '</a>' +
                            '</li>';
                    }
                    $(this).html(html);
                }else{
                    var html = '<li><a href="#">' +
                        '<span class="message"> 没有查询到任何记录。 </span>' +
                        '</a>' +
                        '</li>';
                    $(this).html(html);
                }
            });
        });
    });

</script>
</body>

</html>
