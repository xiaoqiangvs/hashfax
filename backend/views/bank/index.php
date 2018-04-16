<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 客户银行卡';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>客户银行卡</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 客户银行卡
    <small>列表 & 银行卡</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 银行卡记录表展示客户绑定的银行卡信息，可进行查看操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="9">
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="cust_name" placeholder="姓名"/>
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
                            <th width="10%"> 姓名 </th>
                            <th width="10%"> E-mail </th>
                            <th width="10%"> 手机号码 </th>
                            <th width="10%"> 银行 </th>
                            <th width="10%"> 支行 </th>
                            <th width="20%"> 银行卡号 </th>
                            <th width="10%"> 绑定时间 </th>
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