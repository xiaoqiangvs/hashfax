<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 商品订单';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>商品订单</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 商品订单
    <small>列表 & 成交</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 商品订单记录表展示客户提交的订单信息，可进行查看操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="10">
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="cust_name" placeholder="姓名"/>
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="account" placeholder="账号"/>
                                    <input type="text" class="form-control form-filter input-xxlg input-inline" style="width:120px;" name="cust_phone" placeholder="手机"/>
                                    <div class="input-group date date-picker input-inline" data-date-format="yyyy-mm-dd">
                                        <input class="form-control form-filter input-xxlg" style="width:120px;" readonly="" name="start_date" placeholder="From" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-xsmall default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="input-group date date-picker input-inline" data-date-format="yyyy-mm-dd">
                                        <input class="form-control form-filter input-xxlg" style="width:120px;" readonly="" name="end_date" placeholder="To" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-xsmall default" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <button class="btn btn-xsmall yellow filter-submit margin-bottom table-group-action-submit"><i class="fa fa-search"></i> 查询</button>
                                </div>
                            </td>
                        </tr>
                        <tr role="row" class="heading">
                            <th width="2%">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th width="10%"> 订单号 </th>
                            <th width="10%"> 姓名 </th>
                            <th width="10%"> 账号 </th>
                            <th width="10%"> 手机号码 </th>
                            <th width="10%"> 商品 </th>
                            <th width="10%"> 数量 </th>
                            <th width="10%"> 租金 </th>
                            <th width="10%"> 购买时间 </th>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>