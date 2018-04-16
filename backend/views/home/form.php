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
                <h4 class="modal-title">增加配置</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" id="saveForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('home/update')?>" data-rec="<?=Url::toRoute('home/index')?>">

                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
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
            <label class="control-label col-md-3">变量名
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="sys_var" class="form-control" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">变量值
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="sys_value" class="form-control" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">变量说明
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <textarea name="sys_desp" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>



