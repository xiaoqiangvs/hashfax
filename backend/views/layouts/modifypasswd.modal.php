<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="modal fade draggable-modal" role="dialog" id="modifyPasswdModal" aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" id="modifyPasswdForm" class="form-horizontal" method="post"
                          data-save="<?=Url::toRoute('admin/modify')?>" data-rec="<?=Url::toRoute('home/index')?>">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> 表单有错误，请检查。 </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> 表单验证通过！ </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">密码
                                            <span class="required"> * </span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input name="password" type="password" class="form-control newpassword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">重复密码
                                            <span class="required"> * </span></label>
                                        <div class="col-md-8">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input name="repassword" type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions hide">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" id="modifyPasswdFormSubmit" class="btn green">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">取消</button>
                <button type="button" class="btn green" onclick="javascript:document.getElementById('modifyPasswdFormSubmit').click();">保存</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var modRules = {
        password:{
            minlength: 6,
            required: true
        },
        repassword:{
            minlength: 6,
            required: true,
            equalTo: ".newpassword"
        }
    };
    var modMessages = {
        password:{
            minlength: '密码至少6个字符。',
            required: '密码为必填项。'
        },
        repassword:{
            minlength: '重复密码至少6个字符。',
            required: '重复密码为必填项。',
            equalTo: "两次密码输入不一致。"
        }
    };
</script>




