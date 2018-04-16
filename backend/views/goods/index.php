<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 商品管理';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>商品管理</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 商品管理
    <small>列表 & 编辑 & 发布</small>
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
                            <td colspan="12">
                                <div class="pull-left">
                                    &nbsp;&nbsp;<button class="btn btn-xsmall green margin-bottom" data-toggle="modal" data-target='#draggable' onclick="insertFormBody('saveForm')">
                                        <i class="fa fa-plus">添加商品</i>
                                    </button>
                                    <button class="btn btn-xsmall green margin-bottom" onclick="setFlag('0', '<?=Url::toRoute("goods/flag")?>', '<?=Url::toRoute("goods/index")?>')">
                                        <i class="fa fa-arrow-circle-down">上架</i>
                                    </button>
                                    <button class="btn btn-xsmall green margin-bottom" onclick="setFlag('1', '<?=Url::toRoute("goods/flag")?>', '<?=Url::toRoute("goods/index")?>')">
                                        <i class="fa fa-arrow-circle-up">下架</i>
                                    </button>
                                </div>
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="good_title" placeholder="商品名称"/>
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
                            <th width="10%"> 商品名称 </th>
                            <th width="10%"> 租赁价格 </th>
                            <th width="10%"> 单位算力 </th>
                            <th width="10%"> 库存 </th>
                            <th width="10%"> 开放租赁时间 </th>
                            <th width="10%"> 算力租赁天数 </th>
                            <th width="10%"> 回本周期(天) </th>
                            <th> 状态 </th>
                            <th> 上下架 </th>
                            <th> 添加时间 </th>
                            <th width="100px"> 操作 </th>
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
            good_title:{
                minlength: 2,
                required: true
            },
            good_price:{
                minlength: 2,
                required: true,
                number: true
            },
            sign_calc:{
                minlength: 3,
                required: true
            },
            store:{
                minlength: 1,
                required: true,
                number: true
            },
            opentime:{
                required: true
            },
            zuli_days:{
                minlength: 2,
                required: true,
                number: true
            },
            huiben_days:{
                minlength: 2,
                required: true,
                number: true
            },
            gonghao: {
                required: true,
                number: true
            },
            ri_weihu: {
                required: true,
                number: true
            },
            dianfei: {
                required: true,
                number: true
            }
        };
        var messages = {
            good_title:{
                minlength: '商品名称至少2个字符。',
                required: '商品名称为必填项。'
            },
            good_price:{
                minlength: '租赁价格至少2个字符。',
                required: '租赁价格为必填项。',
                number: '租赁价格格式错误。'
            },
            sign_calc:{
                minlength: '单位算力至少3个字符。',
                required: '单位算力为必填项。'
            },
            store:{
                minlength: '库存至少1个字符。',
                required: '库存为必填项。',
                number: '库存格式错误。'
            },
            opentime:{
                required: '租赁开放时间为必填项。'
            },
            zuli_days:{
                minlength: '租赁天数至少2个字符。',
                required: '租赁天数为必填项。',
                number: '租赁天数格式错误。'
            },
            huiben_days:{
                minlength: '回本周期至少2个字符。',
                required: '回本周期为必填项。',
                number: '回本周期格式错误。'
            },
            gonghao: {
                required: '功耗为必填项。',
                number: '功耗格式错误。'
            },
            ri_weihu: {
                required: '日维护费用为必填项。',
                number: '日维护费用式错误。'
            },
            dianfei: {
                required: '电费为必填项。',
                number: '电费格式错误。'
            }
        };
</script>
<?php include('form.php'); ?>