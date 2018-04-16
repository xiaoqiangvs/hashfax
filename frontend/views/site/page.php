<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = $page_loc;
?>
<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>">首页</a></li>
                    <li class="active"><?=$page_loc?></li>
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
            <?php include('aside.php'); ?>
            <!-- sidebar end -->

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8 col-md-offset-1">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title"><?=$page_title?></h1>
                <hr>
                <!-- page-title end -->
                <p>接电厂通知，为迎接党的十九大的胜利召开，配合做好安全生产大检查，17日起电厂暂停送电，进行整顿检修。</p>
                <p>停电时间为：2017年10月17日-2017年10月25日。</p>
                <p>机器停止运行，停电期间无收益，10月18日-10月26日，E2、E6云算力不分币。</p>
                <?=$page_content?>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<?php include('clearfix.php'); ?>