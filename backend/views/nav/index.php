<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 导航设置';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>导航设置</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 导航设置
    <small>设置 & 添加</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 导航设置表展示网站的导航布局信息，可进行查看编辑操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="10">
                                <div class="pull-left">
                                    &nbsp;&nbsp;<button class="btn btn-xsmall green margin-bottom" data-toggle="modal" data-target='#draggable' onclick="insertFormBody('saveForm')"><i class="fa fa-plus"></i> 增加</button>
                                    <button class="btn btn-xsmall red margin-bottom" data-toggle="modal" data-target='#draggable'><i class="fa fa-remove"></i> 删除</button>
                                </div>
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xlg input-inline" name="nav_name" placeholder="导航名"/>
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
                            <th width="10%"> 导航名 </th>
                            <th width="10%"> 英文名 </th>
                            <th width="10%"> 模块名 </th>
                            <th width="10%"> 链接地址 </th>
                            <th width="10%"> 序号 </th>
                            <th width="10%"> 关联导航 </th>
                            <th width="10%"> 显示子导航</th>
                            <th width="10%"> 显示</th>
                            <th width="10%"> 添加时间 </th>
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
            nav_name:{
                minlength: 2,
                required: true
            }
        };
        var messages = {
            nav_name:{
                minlength: '导航名称至少2个字符。',
                required: '导航名称为必填项。'
            }
        };
    </script>
<?php include("form.php"); ?>