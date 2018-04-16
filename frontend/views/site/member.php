<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = '会员中心';
?>
<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>">首页</a></li>
                    <li class="active">会员中心</li>
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

            <!-- sidebar start -->
            <aside class="col-md-3">
                <div class="sidebar">
                    <div class="block clearfix">
                        <h4 class="title">我的账户</h4>
                        <div class="separator"></div>
                        <nav>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="index.html">财务中心</a></li>
                                <li class="active"><a href="blog-right-sidebar.html">充值业务</a></li>
                                <li><a href="portfolio-3col.html">提现业务</a></li>
                                <li><a href="page-about.html">资金账号</a></li>
                                <li><a href="page-contact.html">综合账单</a></li>
                                <li><a href="page-contact.html">安全中心</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="block clearfix">
                        <h4 class="title">云算力</h4>
                        <div class="separator"></div>
                        <ul class="tweets">
                            <li>
                                <p>第6期——腾云E6以太经典云算力热销中</p>
                            </li>
                            <li>
                                <p>第6期——腾云E6以太经典云算力热销中</p>
                            </li>
                        </ul>
                    </div>
                    <div class="block clearfix">
                        <h4 class="title">帮助中心</h4>
                        <div class="separator"></div>
                        <div class="image-box">
                            <div class="image-box-body">
                                <p>客服电话：400-040-8288</p>

                                <p>技术支持：support@jua.com</p>

                                <p>客户服务：service@jua.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- sidebar end -->

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8 col-md-offset-1">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Blog</h1>
                <div class="separator-2"></div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas nulla suscipit <br class="hidden-sm hidden-xs"> unde rerum mollitia dolorum.</p>
                <!-- page-title end -->

                <!-- blogpost start -->
                <article class="clearfix blogpost object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                    <div class="overlay-container">
                        <img src="images/blog-1.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="blog-post.html"><i class="fa fa-link"></i></a>
                                <a href="images/blog-1.jpg" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blogpost-body">
                        <div class="post-info">
                            <span class="day">12</span>
                            <span class="month">Sept 2014</span>
                        </div>
                        <div class="blogpost-content">
                            <header>
                                <h2 class="title"><a href="blog-post.html">Blogpost with image</a></h2>
                                <div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>
                            </header>
                            <p>Mauris dolor sapien, malesuada at interdum ut, hendrerit eget lorem. Nunc interdum mi neque, et  sollicitudin purus fermentum ut. Suspendisse faucibus nibh odio, a vehicula eros pharetra in. Maecenas  ullamcorper commodo rutrum. In iaculis lectus vel augue eleifend dignissim. Aenean viverra semper sollicitudin.</p>
                        </div>
                    </div>
                    <footer class="clearfix">
                        <ul class="links pull-left">
                            <li><i class="fa fa-comment-o pr-5"></i> <a href="#">22 comments</a> |</li>
                            <li><i class="fa fa-tags pr-5"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a> </li>
                        </ul>
                        <a class="pull-right link" href="blog-post.html"><span>Read more</span></a>
                    </footer>
                </article>
                <!-- blogpost end -->

                <!-- pagination start -->
                <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                </ul>
                <!-- pagination end -->

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