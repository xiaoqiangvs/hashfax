<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 客户列表';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>客户列表</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 客户列表
    <small>列表 & 编辑</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 客户记录表展示客户的基本信息，可进行编辑/删除等操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="9">
                                <div class="pull-left">
                                    &nbsp;&nbsp;<button class="btn btn-xsmall green margin-bottom" data-toggle="modal" data-target='#draggable' onclick="insertFormBody('saveForm')">
                                        <i class="fa fa-plus"></i> 添加客户
                                    </button>
                                </div>
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="cust_name" placeholder="姓名"/>
                                    <input type="text" class="form-control form-filter input-xxlg input-inline" style="width:120px;" name="cust_phone" placeholder="手机"/>
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
                            <th width="15%"> 姓名 </th>
                            <th width="10%"> 别名 </th>
                            <th width="10%"> E-mail </th>
                            <th width="10%"> 手机号码 </th>
                            <th width="10%"> 可用余额 </th>
                            <th width="10%"> 冻结金额 </th>
                            <th width="10%"> 创建时间 </th>
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
            cust_name:{
                minlength: 2,
                required: true
            },
            cust_alias:{
                minlength: 2,
                required: true
            },
            account:{
                minlength: 5,
                required: true
            },
            cust_phone:{
                minlength: 9,
                maxlength: 12,
                required: true,
                number: true
            }
        };
        var messages = {
            cust_name:{
                minlength: '客户名称至少2个字符。',
                required: '客户名称为必填项。'
            },
            cust_alias:{
                minlength: '别名至少2个字符。',
                required: '别名为必填项。'
            },
            account:{
                minlength: '账号至少5个字符。',
                required: '账号为必填项。'
            },
            cust_phone:{
                minlength: '手机至少9个字符。',
                maxlength: '手机不超过12个字符。',
                required: '手机为必填项。',
                number: '手机格式错误。'
            }
        };
</script>
<?php include("form.php"); ?>