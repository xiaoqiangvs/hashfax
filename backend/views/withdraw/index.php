<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 提现记录';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>提现记录</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 提现记录
    <small>记录 & 搜索</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 提现记录表展示客户发起的提现信息，可进行查看提交完成提现操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="12">
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="cust_name" placeholder="姓名"/>
                                    <select name="status" class="form-control form-filter input-xxlg input-inline">
                                        <option value="">--请选择状态--</option>
                                        <option value="0">待提现</option>
                                        <option value="1">已完成</option>
                                    </select>
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
                            <th width="10%"> 币种 </th>
                            <th width="10%"> 提取地址/卡号 </th>
                            <th width="10%"> 提现金额 </th>
                            <th width="10%"> 申请时间 </th>
                            <th width="10%"> 状态 </th>
                            <th width="10%"> 完成提现时间 </th>
                            <th width="10%"> 描述 </th>
                            <th width="10%"> 操作 </th>
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

<script type="text/javascript">
    var rules = {
        desp:{
            minlength: 10,
            maxlength: 100,
            required: true
        }
    };
    var messages = {
        desp:{
            minlength: '描述至少10个字符。',
            maxlength: '描述不得超过100个字符。',
            required: '描述为必填项。'
        }
    };
</script>

<div class="modal fade draggable-modal" id="draggable" tabindex="-1" aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">提现说明</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button> 提交提现说明后，提现申请状态变为已完成。
                    </div>
                    <form action="#" id="saveForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('withdraw/update')?>" data-rec="<?=Url::toRoute('withdraw/index')?>">
                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="hidden" name="log_id"/>
                                    <button type="submit" id="formSubmit" class="btn green">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">取消</button>
                <button type="button" class="btn green" onclick="javascript:document.getElementById('formSubmit').click();">保存</button>
            </div>
        </div>
    </div>
</div>

<!-- form body tpl -->
<div class="form-body-tpl hide">
    <div class="form-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group last">
                    <label class="control-label col-md-2">提现描述
                        <span class="required"></span>
                    </label>
                    <div class="col-md-7">
                        <textarea class="form-control" name="desp" rows="3" data-error-container="#editor2_error"></textarea>
                        <div id="editor2_error"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>