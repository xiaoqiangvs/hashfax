<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::t('app', '官方公告');
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
                <h1 class="page-title"><?=$this->title?></h1>
                <div class="separator-2"></div>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas nulla suscipit <br class="hidden-sm hidden-xs"> unde rerum mollitia dolorum.</p>
                <!-- page-title end -->

                <?php foreach($noticeList as $val){
                    $url = Url::toRoute(['site/detail', 'id' => $val['notice_id']]);
                    ?>
                    <!-- notice start -->
                    <article class="clearfix blogpost object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="200">
                        <!--<div class="overlay-container">
                            <img src="images/blog-1.jpg" alt="">
                            <div class="overlay">
                                <div class="overlay-links">
                                    <a href="blog-post.html"><i class="fa fa-link"></i></a>
                                    <a href="images/blog-1.jpg" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>-->
                        <div class="blogpost-body">
                            <div class="post-info">
                                <span class="day"><?=date('d', strtotime($val['ctime']))?></span>
                                <span class="month"><?=date('M Y', strtotime($val['ctime']))?></span>
                            </div>
                            <div class="blogpost-content" style="height:165px; overflow:hidden; margin-bottom:10px;">
                                <header>
                                    <h2 class="title"><a href="<?=$url?>"><?=$val['notice_title']?></a></h2>
                                    <div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="<?=$url?>"><?=$val['notice_author']?></a></div>
                                </header>
                                <?=$val['notice_content']?>
                            </div>
                        </div>
                        <footer class="clearfix">
                            <ul class="links pull-left">
                                <li><i class="fa fa-comment-o pr-5"></i> <a href="<?=$url?>"><?=$val['count']?><?=Yii::t('app', '次阅读')?></a> </li>
                            </ul>
                            <a class="pull-right link" href="<?=$url?>"><span><?=Yii::t('app', '更多')?></span></a>
                        </footer>
                    </article>
                    <!-- notice end -->
                <?php } ?>


                <!-- pagination start -->
                <ul class="pagination">
                    <li><a href="<?=Url::toRoute(['site/notice', 's' => 0])?>">«</a></li>
                    <?php $page = ceil($recordTotal/5);
                    for($i=0; $i< $page; $i++){?>
                        <li <?php if($s/5 == $i){?>class="active"<?php } ?>><a href="<?=Url::toRoute(['site/notice', 's' => $i*5])?>"><?=($i+1)?>
                                <?php if($s/5 == $i){?><span class="sr-only">(current)</span><?php } ?></a>
                        </li>
                    <?php } ?>
                    <li><a href="<?=Url::toRoute(['site/notice', 's' => $page])?>">»</a></li>
                </ul>
                <!-- pagination end -->

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<?php include('clearfix.php'); ?>