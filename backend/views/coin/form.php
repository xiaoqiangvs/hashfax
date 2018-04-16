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
                <h4 class="modal-title">币种信息编辑</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" id="saveForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('coin/update')?>" data-rec="<?=Url::toRoute('coin/index')?>">

                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="hidden" name="coin_id"/>
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
            <label class="control-label col-md-3">币种名称
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="coin_type" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">币种地址
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="coin_addr" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">链接地址
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <textarea name="coin_url" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">排序
                <span class="required"> * </span>
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="sort" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">描述
            </label>
            <div class="col-md-9">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <input type="text" name="coin_desp" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>



