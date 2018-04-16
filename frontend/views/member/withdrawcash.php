<?php/* @var $this yii\web\View */use yii\helpers\Url;$this->title = '提现业务';?><!-- page-intro start--><!-- ================ --><div class="page-intro">    <div class="container">        <div class="row">            <div class="col-md-12">                <ol class="breadcrumb">                    <li><i class="fa fa-home pr-10"></i><a href="<?=Url::toRoute('site/index')?>">首页</a></li>                    <li class="active"><?=$this->title?></li>                </ol>            </div>        </div>    </div></div><!-- page-intro end --><!-- main-container start --><!-- ================ --><section class="main-container">    <div class="container">        <div class="row">            <!-- sidebar start -->            <?php include('aside.php'); ?>            <!-- sidebar end -->            <!-- main start -->            <!-- ================ -->            <div class="main col-md-8 col-md-offset-1">                <!-- page-title start -->                <!-- ================ -->                <h1 class="page-title"><?=$this->title?></h1>                <div class="separator-2"></div>                <!-- product side start -->                <aside>                    <div class="sidebar">                        <div class="side product-item">                            <div class="tabs-style-2">                                <!-- Nav tabs -->                                <ul class="nav nav-tabs" role="tablist">                                    <?php $count = 0; foreach($coinList as $val){ ?>                                        <li <?php if($c == $val['coin_id']){echo 'class="active"'; }?> >                                            <a href="#" data-href="<?=Url::toRoute(['member/withdrawcash', 'c' => $val['coin_id']])?>"                                               role="tab" data-toggle="tab" onclick="tabLocUrl(this)"                                            ><?=$val['coin_type']?></a>                                        </li>                                        <?php $count++; } ?>                                </ul>                                <!-- Tab panes -->                                <div class="tab-content <?php if(!$addrList){ ?>padding-top-clear<?php } ?> padding-bottom-clear">                                    <?php $count = 0; foreach($coinList as $val){ ?>                                        <div class="tab-pane fade <?php if($c == $val['coin_id']){echo 'in active'; }?>" id="h2<?=$val['coin_type']?>">                                            <?php if(!$addrList){ ?>                                            <div class="alert alert-warning" role="alert">                                                <strong>警告!</strong> 没有可供选择的地址/卡号，务必在<a href="<?=Url::toRoute('member/index')?>">资金账号</a>中添加。                                            </div>                                            <?php } ?>                                            <?php if($c == $val['coin_id']){ ?>                                            <div class="row">                                                <form class="form-horizontal" id="withdrawcashForm" data-url="<?=Url::toRoute('member/addmount')?>">                                                    <div class="form-group">                                                        <label class="col-sm-3 control-label">提现地址/卡号：</label>                                                        <div class="col-sm-6">                                                            <select class="form-control" name="account_id">                                                                <?php if($addrList){ foreach($addrList as $key => $addr){ ?>                                                                    <option value="<?=$key?>"><?=$addr?></option>                                                                <?php }}else{ ?>                                                                    <option value="">没有可供选择的地址/卡号</option>                                                                <?php } ?>                                                            </select>                                                        </div>                                                    </div>                                                    <div class="form-group">                                                        <label class="col-sm-3 control-label">可用余额：</label>                                                        <div class="col-sm-6">                                                            <input type="text" readonly name="balance" class="form-control" placeholder="可用余额" value="<?php if($coinBList){ echo $coinBList['balance']; } ?>">                                                        </div>                                                    </div>                                                    <div class="form-group">                                                        <label class="col-sm-3 control-label">提现金额：</label>                                                        <div class="col-sm-6">                                                            <input type="text" name="amount" class="form-control" placeholder="提现金额">                                                        </div>                                                    </div>                                                    <div class="form-group">                                                        <label class="col-sm-3 control-label">安全密码：</label>                                                        <div class="col-sm-6">                                                            <input type="password" name="security_password" class="form-control" placeholder="安全密码">                                                        </div>                                                    </div>                                                    <div class="form-group">                                                        <label class="col-sm-3 control-label">手机/邮箱验证码：</label>                                                        <div class="col-sm-6">                                                            <div class="input-group">                                                                <input type="text" name="autoCaptcha" class="form-control" placeholder="验证码">                                                                <div class="input-group-addon autoCaptchaBtn" data-flag="wdcEmail" data-url="<?=url::toRoute('site/send')?>" style="cursor:pointer">获取验证码</div>                                                            </div>                                                        </div>                                                    </div>                                                    <div class="form-group">                                                        <div class="col-sm-3"></div>                                                        <div class="col-sm-6">                                                            <input type="hidden" name="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>"/>                                                            <input type="hidden" name="coin_id" value="<?=$c?>"/>                                                            <button type="submit" class="btn btn-sm btn-warning">提交</button>                                                        </div>                                                    </div>                                                </form>                                            </div>                                            <?php } ?>                                            <div class="row">                                                <div class="col-md-12 col-sm-12">                                                    <h4>提现记录</h4>                                                    <table class="table table-striped table-bordered">                                                        <thead>                                                        <tr>                                                            <th>币种</th>                                                            <th>数量</th>                                                            <th>时间</th>                                                            <th>描述</th>                                                        </tr>                                                        </thead>                                                        <tbody>                                                        <?php if($c == $val['coin_id']){                                                            if($logList){ foreach($logList as $lval){ ?>                                                                <tr>                                                                    <td><?=$val['coin_type']?></td>                                                                    <td><?=$lval['amount']?></td>                                                                    <td><?=$lval['ctime']?></td>                                                                    <td><?=$lval['desp']?></td>                                                                </tr>                                                            <?php }}                                                        } ?>                                                        </tbody>                                                    </table>                                                    <?php if($c == $val['coin_id']){ ?>                                                        <!-- pagination start -->                                                        <ul class="pagination">                                                            <li><a href="<?=Url::toRoute(['member/withdrawcash', 's' => 0, 'c' => $c])?>">«</a></li>                                                            <?php $page = ceil($recordTotal/10);                                                            for($i=0; $i< $page; $i++){?>                                                                <li <?php if($s/5 == $i){?>class="active"<?php } ?>><a href="<?=Url::toRoute(['member/withdrawcash', 's' => $i*5, 'c' => $c])?>"><?=($i+1)?>                                                                        <?php if($s/5 == $i){?><span class="sr-only">(current)</span><?php } ?></a>                                                                </li>                                                            <?php } ?>                                                            <li><a href="<?=Url::toRoute(['member/withdrawcash', 's' => $page, 'c' => $c])?>">»</a></li>                                                        </ul>                                                        <!-- pagination end -->                                                    <?php } ?>                                                </div>                                            </div>                                        </div>                                        <?php $count++; } ?>                                </div>                            </div>                        </div>                    </div>                </aside>                <!-- product side end -->            </div>            <!-- main end -->        </div>    </div></section><!-- main-container end -->