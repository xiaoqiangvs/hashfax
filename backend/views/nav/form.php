<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modal fade draggable-modal" id="draggable" tabindex="-1" aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">导航信息编辑</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" id="saveForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('nav/update')?>" data-rec="<?=Url::toRoute('nav/index')?>">

                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="hidden" name="nav_id"/>
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
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> 表单有错误，请检查。 </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button> 表单验证通过！ </div>
        <div class="form-group">
            <label class="control-label col-md-3">导航名称
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="nav_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">英文名称
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="nav_name_en" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">顺序号
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="sort" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">模块名
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="nav_ctrl" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">链接地址
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="nav_url" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">等级</label>
            <div class="col-md-9">
                <select class="form-control select2 input-small" name="nav_level">
                    <option value="0">顶级导航</option>
                    <option value="1">子页导航</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="multiple" class="control-label col-md-3">相关二级</label>
            <div class="col-md-9">
                <select class="form-control select2-multiple" style="width:100%;" name="rel_nav_id[]" multiple>
                    <?php foreach($subMenu as $val){ ?>
                        <option value="<?=$val['nav_id']?>"><?=$val['nav_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">显示左侧导航</label>
            <div class="col-md-9">
                <div class="mt-radio-inline" style="padding-bottom: 0px;">
                    <label class="mt-radio"> 是
                        <input type="radio" value="0" name="display_sub" />
                        <span></span>
                    </label>
                    <label class="mt-radio"> 否
                        <input type="radio" value="1" name="display_sub" checked/>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">显示</label>
            <div class="col-md-9">
                <div class="mt-radio-inline" style="padding-bottom: 0px;">
                    <label class="mt-radio"> 是
                        <input type="radio" value="0" name="display" checked/>
                        <span></span>
                    </label>
                    <label class="mt-radio"> 否
                        <input type="radio" value="1" name="display" />
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>



