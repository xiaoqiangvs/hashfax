<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 产品管理';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>产品管理</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 产品管理
    <small>列表 & 编辑</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 产品记录表展示公司拥有那些产品，可进行查看操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="6">
                                <div class="pull-left">
                                    &nbsp;&nbsp;<button class="btn btn-xsmall green margin-bottom" data-toggle="modal" data-target='#draggable' onclick="insertFormBody('saveForm')">
                                        <i class="fa fa-plus">添加产品</i>
                                    </button>
                                </div>
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xsmall input-inline" name="prod_name" placeholder="产品名称"/>
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
                            <th> 产品名称 </th>
                            <th> 算力 </th>
                            <th> 描述 </th>
                            <th> 添加时间 </th>
                            <th>操作</th>
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
            prod_name:{
                minlength: 2,
                required: true
            },
            suanli:{
                minlength: 2,
                required: true
            },
            desp:{
                minlength: 3,
                maxlength: 100,
                required: true
            }
        };
        var messages = {
            prod_name:{
                minlength: '产品名称至少2个字符。',
                required: '产品名称为必填项。'
            },
            suanli:{
                minlength: '算力至少2个字符。',
                required: '算力为必填项。'
            },
            desp:{
                minlength: '描述至少3个字符。',
                maxlength: '描述不能超过100个字符',
                required: '描述为必填项。'
            }
        };
</script>
<?php include('form.php'); ?>