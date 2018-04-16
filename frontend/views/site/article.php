<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', '新闻动态');
?>
    <!-- page-intro start-->
    <!-- ================ -->
    <div class="page-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>"><?=Yii::t('app', '首页')?></a></li>
                        <li class="active"><?=$this->title?></li>
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
                    <h1 class="page-title"><?=$news_title?></h1>
                    <?=Yii::t('app', '发布人：')?><?=$news_author?>  <?=Yii::t('app', '发布时间：')?><?=$ctime?>
                    <hr>
                    <!-- page-title end -->
                    <?=$news_content?>
                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->

<?php include('clearfix.php'); ?>