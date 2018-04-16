<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = '云';
?>

<!-- banner start -->
<!-- ================ -->
<div class="banner">
    <div class="fixed-image section parallax-bg-3" style="height:300px;">
        <div class="container">
            <!--<div class="space-top"></div>-->
            <h1 style="color:#fff">
                <?=$good_title?>
            </h1>
            <div class="separator-2"></div>
            <p class="lead" style="color:#fff">发行总量：<?=$store?> 台 | 租赁价格：<?=$good_price?>$/台 | 状态：<?php if($status){?>
                    <span class="badge-danger"> [ 已售罄 ] </span>
                <?php }else{ ?>
                    <span class="badge-warning"> [ 可购 ] </span>
                <?php } ?></p>
            <p class="lead" style="color:#fff">算力交付时间：全款付讫后第7日零时</p>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container gray-bg">

    <!-- main start -->
    <!-- ================ -->
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center title">如何加入</h1>
                    <div class="separator"></div>
                    <p class="text-center">Mining In Cloud , Earn Money Easily !</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                <i class="fa fa-credit-card"></i>
                                <h2>1. 充值</h2>
                                <p>算力之家接受数字货币充值业务</p>
                                <a <?php if(!Yii::$app->session->get('cust')){?>
                                    href="#"
                                    data-toggle="modal" data-target="#loginModal"
                                <?php }else{ ?>
                                    href="<?=Url::toRoute('member/recharge')?>"
                                <?php } ?>
                                   class="btn-default btn">充值</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                                <i class="fa fa-shopping-cart"></i>
                                <h2>2. 购买</h2>
                                <p>在项目开始销售后，使用人民币或数字货币购买。</p>
                                <a href="#" data-toggle="modal" <?php if(!Yii::$app->session->get('cust')){?>
                                    data-target="#loginModal"
                                <?php }else{ ?>
                                    data-target="#CartModal"
                                <?php } ?> class="btn-default btn">立即购买</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <i class="fa fa-line-chart"></i>
                                <h2>3. 收益</h2>
                                <p>自项目交割日开始，每日都会发放收益，拥有的云算力越多收益越多。</p>
                                <a <?php if(!Yii::$app->session->get('cust')){?>
                                    href="#"
                                    data-toggle="modal" data-target="#loginModal"
                                <?php }else{ ?>
                                    href="<?=Url::toRoute('member/finance')?>"
                                <?php } ?> class="btn-default btn">查看收益</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main end -->

</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<div class="parallax parallax-bg-3 object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center title" style="color:#fff">项目说明</h1>
                <div class="separator"></div>
            </div>
            <div class="col-md-12">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="testimonial clearfix">
                                    <div class="testimonial-body">
                                        <h2 class="title" style="color:#fff"><?=$good_price?>$/T</h2>
                                        <p style="color:#fff">云算力单价 CNY/台</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="testimonial clearfix">
                                    <div class="testimonial-body">
                                        <h2 class="title" style="color:#fff"><?=$ri_weihu?></h2>
                                        <p style="color:#fff">日维护费用 CNY/台/DAY</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="testimonial clearfix">
                                    <div class="testimonial-body">
                                        <h2 class="title" style="color:#fff"><?=$dianfei?></h2>
                                        <p style="color:#fff">电费 CNY/KWH</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="testimonial clearfix">
                                    <div class="testimonial-body">
                                        <h2 class="title" style="color:#fff"><?=$gonghao?></h2>
                                        <p style="color:#fff">矿机功耗 W/台</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="owl-carousel content-slider-with-controls">
                            <div class="overlay-container">
                                <img src="images/313A313A3235_291603.jpg" alt="">
                                <div class="caption">
                                    <h3 class="title">本协议所指腾云E6是基于腾云定制特种计算机T2进行的以太坊云计算服务项目。</h3>
                                </div>
                            </div>
                            <div class="overlay-container">
                                <img src="images/313A313A3235_291604.jpg" alt="">
                                <div class="caption">
                                    <h3 class="title">本协议所指腾云E6是基于腾云定制特种计算机T2进行的以太坊云计算服务项目。</h3>
                                </div>
                                <!--<a href="images/313A313A3235_291604.jpg" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a> 放大-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" align="center">
                <a href="#" data-toggle="modal" data-target="#protocolModal" class="btn btn-white btn-lg">云算力合约</a>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- 购买记录 -->
<div class="section parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center title">购买记录</h1>
                <div class="separator"></div>
                <p class="text-center">Mining In Cloud , Earn Money Easily !</p>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>时间</th>
                                <th>用户</th>
                                <th>数量</th>
                                <th>算力</th>
                                <th>支付方式</th>
                                <th>累计</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr><td>2017-08-28 10:52:43</td><td>137***792</td><td>3.00台</td><td>450 MH/S</td><td>CNY</td><td>28.8 GH/S</td></tr>
                            <tr><td>2017-08-28 07:21:52</td><td>151***393</td><td>1.00台</td><td>150 MH/S</td><td>ETH</td><td>28.35 GH/S</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section start -->
<!-- ================ -->
<div class="parallax parallax-bg-3 object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center title" style="color:#fff">真实可见算力每日分配收益</h1>
                <div class="separator"></div>
                <p class="text-center" style="color:#fff">回本至110%前，用户获得每日净收益100%；回本至110%后，用户占每日净收益50%。</p>
            </div>
            <div class="col-md-12" align="center">
                <a href="#" class="btn btn-white btn-lg"
                    <?php if(!Yii::$app->session->get('cust')){?> data-toggle="modal" data-target="#loginModal" <?php }else{ ?>
                        data-toggle="modal" data-target="#CartModal"
                    <?php } ?>
                >
                    立即购买
                </a>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<!-- FAQ -->
<div class="section parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center title">算力FAQ</h1>
                <div class="separator"></div>
            </div>
        </div>
    </div>
</div>

<?php include ('protocol.modal.php'); ?>
<?php if(!Yii::$app->session->get('cust')){
    $this->beginContent('@app/views/layouts/mem.modal.php');
    $this->endContent();
} else {
    include('cart.modal.php');
} ?>
