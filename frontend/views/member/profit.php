<?php/* @var $this yii\web\View */use yii\helpers\Url;$this->title = '当前状态';?><!-- page-intro start--><!-- ================ --><div class="page-intro">    <div class="container">        <div class="row">            <div class="col-md-12">                <ol class="breadcrumb">                    <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>">首页</a></li>                    <li class="active"><?=$this->title?></li>                </ol>            </div>        </div>    </div></div><!-- page-intro end --><!-- main-container start --><!-- ================ --><section class="main-container">    <div class="container">        <div class="row">            <!-- sidebar start -->            <?php include('aside.php'); ?>            <!-- sidebar end -->            <!-- main start -->            <!-- ================ -->            <div class="main col-md-8 col-md-offset-1">                <!-- page-title start -->                <!-- ================ -->                <h1 class="page-title"><?=$this->title?></h1>                <div class="separator-2"></div>                <!-- 日志 -->                <div class="tabs-style-2">                    <!-- Tab panes -->                    <div class="tab-content padding-bottom-clear">                        <div class="tab-pane fade in active">                            <table class="table table-striped table-bordered">                                <thead>                                <tr>                                    <th>产品</th>                                    <th>收益</th>                                    <th>购买产品期限（天）</th>                                    <th>回本预计（天）</th>                                    <th>收益预估</th>                                    <th>其他</th>                                </tr>                                </thead>                                <tbody>                                <?php if($buylog){ foreach($buylog as $val){ ?>                                    <tr>                                        <td><?=$goodlist[$val['good_id']]?></td>                                        <td><?=$dprice?></td>                                        <td><?=$zulidays[$val['good_id']]?></td>                                        <td><?=$huibendays[$val['good_id']]?></td>                                        <td><?=$profit[$val['order_id']]?>/<?=$price[$val['order_id']]?></td>                                        <td>操作</td>                                    </tr>                                <?php }} ?>                                </tbody>                            </table>                            <!-- pagination start -->                            <!-- pagination end -->                        </div>                    </div>                </div>            </div>            <!-- main end -->        </div>    </div></section><!-- main-container end -->