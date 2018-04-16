<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = '云';

?>

<!-- banner start -->
<!-- ================ -->
<div class="banner">
    <div class="fixed-image section dark-translucent-bg parallax-bg-3" style="height:200px;">
        <div class="container">
            <!--<div class="space-top"></div>-->
            <h1>Cloud Hash</h1>
            <div class="separator-2"></div>
            <p class="lead">Mining In Cloud , Earn Money Easily !</p>
        </div>
    </div>
</div>
<!-- banner end -->

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
                <h1 class="page-title">Cloud Hash Product List</h1>
                <div class="separator-2"></div>
                <p class="lead"></p>
                <!-- page-title end -->

                <!-- shop items start -->
                <div class="masonry-grid-fitrows row grid-space-20">
                    <?php foreach($goods_list as $val){ ?>
                        <div class="col-md-12 col-sm-12 masonry-grid-item">
                            <div class="listing-item">
                                <div class="col-md-4 overlay-container">
                                    <div class="owl-carousel content-slider-with-controls">
                                        <div class="overlay-container">
                                            <img src="images/313A313A3235_291603.jpg" alt="">
<!--                                            <div class="caption">-->
<!--                                                <h3 class="title">Caption Title1</h3>-->
<!--                                            </div>-->
                                            <a href="images/313A313A3235_291603.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <div class="overlay-container">
                                            <img src="images/313A313A3235_291603.jpg" alt="">
<!--                                            <div class="caption">-->
<!--                                                <h3 class="title">Caption Title2</h3>-->
<!--                                            </div>-->
                                            <a href="images/313A313A3235_291603.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                        <div class="overlay-container">
                                            <img src="images/313A313A3235_291603.jpg" alt="">
<!--                                            <div class="caption">-->
<!--                                                <h3 class="title">Caption Title3</h3>-->
<!--                                            </div>-->
                                            <a href="images/313A313A3235_291603.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 listing-item-body clearfix">
                                    <h3 class="title">
                                        <a href="<?=Url::toRoute(['goods/detail', 'id' => $val['good_id']])?>"><?=$val['good_title']?></a>
                                        <?php if($val['status']){?>
                                            <span class="badge-danger"> [ Sold Out ] </span>
                                        <?php }else{ ?>
                                            <span class="badge-warning"> [ In Stock ] </span>
                                        <?php } ?>
                                    </h3>

                                    <div class="col-md-6">
                                        <p>Price : <?=$val['good_price']?>$/T <!--租赁价格：<?=$val['good_price']?> 元/台--></p>
                                        <p>Stock : <?=$val['store']?>T <!--库存：<?=$val['store']?>台--></p>
                                        <p>Start time : <?=$val['opentime']?> <!--开放租赁时间：<?=$val['opentime']?>--></p>
                                        <p>Last time : <?=$val['zuli_days']?>Days <!--算力租赁天数：<?=$val['zuli_days']?>天--></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Hashrate : <?=$val['sign_calc']?> <!--单位算力：<?=$val['sign_calc']?>M--></p>
                                        <p>ETH Price/CNY : <?=$val['eth_cny']?> <!--实时ETH/CNY：<?=$val['eth_cny']?>--></p>
                                        <p>Difficulty : 2,652,389,544,490,025.50 <!--当前难度：2,652,389,544,490,025.50--></p>
                                        <p>Return cycle :  <?=$val['huiben_days']?>Days <!--回本周期：<?=$val['huiben_days']?>天--></p>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-warning btn-sm"
                                            <?php if(!Yii::$app->session->get('cust')){?> data-toggle="modal" data-target="#loginModal" <?php }else{ ?>
                                                data-toggle="modal" data-target="#CartModal"
                                            <?php } ?>
                                        >BUY NOW<!--直接购买--></a>
                                        <a href="<?=Url::toRoute(['goods/detail', 'id' => $val['good_id']])?>" class="btn btn-danger btn-sm">DETAILS<!--查看详情--></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- shop items end

                <div class="clearfix"></div>-->

                <!-- pagination start
                <ul class="pagination">
                    <li><a href="#"><<</a></li>
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">>></a></li>
                </ul>-->
                <!-- pagination end -->

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<div class="section parallax light-translucent-bg parallax-bg-3">
    <div class="container">
        <div class="call-to-action">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title text-center">Clean &amp; Powerful Bootstrap Theme</h1>
                    <p class="text-center">Sed ut Perspiciatis Unde Omnis Iste Sed ut sit  voluptatem accusan tium </p>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="btn btn-default btn-lg">Purchase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<?php if(!Yii::$app->session->get('cust')){
    $this->beginContent('@app/views/layouts/mem.modal.php');
    $this->endContent();
} else {
    include('cart.modal.php');
} ?>
