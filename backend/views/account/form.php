<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="modal fade draggable-modal" role="dialog" id="draggable" aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">添加充值记录</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" id="saveForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('recharge/update')?>" data-rec="<?=Url::toRoute('recharge/index')?>">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> 表单有错误，请检查。 </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> 表单验证通过！ </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">币种类型
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <span class="coin_type" style="line-height:35px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">充值地址
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <span class="account" style="line-height:35px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">充值时间
                                            <span class="required"> * </span></label>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd 00:00:00">
                                                    <input class="form-control input-xxlg" style="width:300px;" name="ctime" type="text">
                                                    <span class="input-group-btn">
                                    <button class="btn btn-xsmall default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">充值金额
                                            <span class="required"> * </span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input name="amount" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">描述
                                            <span class="required"> * </span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <textarea name="desp" type="text" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="hidden" name="account_id"/>
                                    <input type="hidden" name="cust_id"/>
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




