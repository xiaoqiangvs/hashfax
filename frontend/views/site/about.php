<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>"><?=Yii::t('app', '首页')?></a></li>
                    <li class="active"><?=Yii::t('app', '关于我们')?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title"><?=Yii::t('app', '关于我们')?></h1>
                <div class="separator-2"></div>
                <!-- page-title end -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="images/section-image-1.png" alt="">
                            </div>
                            <div class="col-md-6">
                                <p>Quo soluta provident, quod reiciendis. Dolores nam totam aut illum ex ratione harum molestias maxime minima tempore, possimus, laudantium. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                        <p>Esse sequi veniam, assumenda voluptate necessitatibus ipsa dicta vero, minima natus cum cupiditate magnam et placeat quo adipisci.</p>
                        <ul class="list-icons">
                            <li class="object-non-visible" data-animation-effect="fadeInUpSmall"><i class="icon-check"></i> Etiam sed dolor ac diam volutpat</li>
                            <li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100"><i class="icon-check"></i> Sed eget pulvinar quam, vel feugiat enim aliquam </li>
                            <li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="300"><i class="icon-check"></i> Erat volutpat. Phasellus eu porta ipsum suspendisse aliquet imperdiet</li>
                            <li class="object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="500"><i class="icon-check"></i> Phasellus eu porta ipsum. Suspendisse aliquet imperdiet commodo</li>
                        </ul>
                        <div class="space hidden-md hidden-lg"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="owl-carousel content-slider-with-controls">
                            <div class="overlay-container margin-top-clear">
                                <img src="images/page-about-1.jpg" alt="">
                                <a href="images/page-about-1.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="overlay-container margin-top-clear">
                                <img src="images/page-about-2.jpg" alt="">
                                <a href="images/page-about-2.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="overlay-container margin-top-clear">
                                <img src="images/page-about-3.jpg" alt="">
                                <a href="images/page-about-3.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<div class="section gray-bg text-muted footer-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="owl-carousel clients">
                    <div class="client">
                        <a href="#"><img src="images/client-1.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-2.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-3.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-4.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-5.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-6.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-7.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-8.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <blockquote class="inline">
                    <p class="margin-clear">Design is not just what it looks like and feels like. Design is how it works.</p>
                    <footer><cite title="Source Title">Steve Jobs </cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
<!-- section end -->