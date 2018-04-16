<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 页面管理';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>页面管理</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 页面管理
    <small>列表 & 编辑</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-12">
        <div class="note note-danger">
            <p> 提示: 页面管理表展示公司所需发布的单页信息，可进行查看操作. </p>
        </div>
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="filter">
                            <td colspan="5">
                                <div class="pull-left">
                                    &nbsp;&nbsp;<a class="btn btn-xsmall green margin-bottom" href="<?=Url::toRoute("page/edit")?>"><i class="fa fa-plus"></i> 发布</a>
                                    <button class="btn btn-xsmall red margin-bottom" data-toggle="modal" data-target='#draggable'><i class="fa fa-remove"></i> 删除</button>
                                </div>
                                <div class="dataTables_filter pull-right">
                                    <input type="text" class="form-control form-filter input-xlg input-inline" name="page_title" placeholder="标题"/>
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
                            <th width="10%"> 标题 </th>
                            <th width="10%"> SEO关键词 </th>
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