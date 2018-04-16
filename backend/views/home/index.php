<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 网站设置';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>网站设置</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 网站设置
    <small>设置 & 系统设置</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <!-- BEGIN FORM-->
    <button class="btn btn-xsmall green margin-bottom" data-toggle="modal" data-target='#draggable' onclick="insertFormBody('saveForm')"><i class="fa fa-plus"></i> 增加配置</button>
    <form action="#" method="post" id="form_sample_2" class="form-horizontal" data-save="<?=url::toRoute('home/modify')?>" data-rec="<?=url::toRoute('home/index')?>" >
        <div class="form-body">
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> 表单存在错误，请检查。 </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> 表单验证成功！ </div>
            <div class="form-group margin-top-20">
                <label class="control-label col-md-2">公司名称
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_company_name" value="<?php if(isset($_company_name)){ echo $_company_name; } ?>"/> </div>
                </div>
            </div>
            <div class="form-group margin-top-20">
                <label class="control-label col-md-2">公司地址
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_company_addr" value="<?php if(isset($_company_addr)){ echo $_company_addr; } ?>"/> </div>
                </div>
            </div>
            <div class="form-group margin-top-20">
                <label class="control-label col-md-2">公司介绍
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <textarea class="form-control" name="_company_about" rows="2"><?php if(isset($_company_about)){ echo $_company_about; } ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group margin-top-20">
                <label class="control-label col-md-2">网站名称
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_sitename" value="<?php if(isset($_sitename)){ echo $_sitename; } ?>"/> </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">SEO关键词
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <textarea class="form-control" name="_seo_keyword" rows="2"><?php if(isset($_seo_keyword)){ echo $_seo_keyword; } ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">SEO描述
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <textarea class="form-control" name="_seo_desp" rows="2"><?php if(isset($_seo_desp)){ echo $_seo_desp; } ?></textarea>
                    </div>
                    <!--<span class="help-block"> e.g: http://www.demo.com or http://demo.com </span>-->
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">客服电话
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_cust_serv_tel" value="<?php if(isset($_cust_serv_tel)){ echo $_cust_serv_tel; } ?>"/></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">技术支持
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_support_em" value="<?php if(isset($_support_em)){ echo $_support_em; } ?>" /></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">客户服务
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_cust_serv_em" value="<?php if(isset($_cust_serv_em)){ echo $_cust_serv_em; } ?>" /></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">客服QQ
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_site_serv_qq" value="<?php if(isset($_site_serv_qq)){ echo $_site_serv_qq; } ?>" /></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">官方QQ群
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_site_qq" value="<?php if(isset($_site_qq)){ echo $_site_qq; } ?>"/></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">网站备案号
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_site_record_num" value="<?php if(isset($_site_record_num)){ echo $_site_record_num; } ?>" /></div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">网站域名
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_site_domain" value="<?php if(isset($_site_domain)){ echo $_site_domain; } ?>"/></div>
                    <span class="help-block"> e.g: www.xxx.com </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">虚拟货币类型
                    <span class="required"> * </span>
                </label>
                <div class="col-md-4">
                    <div class="input-icon right">
                        <i class="fa"></i>
                        <input type="text" class="form-control" name="_coin_type" value="<?php if(isset($_coin_type)){ echo $_coin_type; } ?>"/></div>
                    <span class="help-block"> e.g: btc,ltc,eth </span>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-2 col-md-9">
                    <input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
                    <button type="submit" class="btn green">提交</button>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM-->
</div>
<script type="text/javascript">
    var rules = {
        _sitename: {
            minlength: 4,
            required: true
        },
        _seo_keyword: {
            minlength: 4,
            maxlength: 80,
            required: true
        },
        _seo_desp: {
            minlength: 4,
            maxlength: 200,
            required: true
        },
        _cust_serv_tel: {
            minlength: 9,
            required: true
        },
        _support_em: {
            required: true,
            email: true
        },
        _cust_serv_em: {
            required: true,
            email: true
        },
        _site_qq: {
            required: true,
            number: true
        },
        _site_domain: {
            required: true,
            minlength: 5
            //url: true
        },
        _coin_type: {
            required: true,
            minlength: 3,
            maxlength: 50
        },
        _site_serv_qq: {
            required: true,
            number: true
        },
        _site_record_num: {
            minlength: 10,
            required: true
        }
        /*'checkboxes1[]': {
            required: true,
            minlength: 2,
        },
        'checkboxes2[]': {
            required: true,
            minlength: 3,
        },
        radio1: {
            required: true
        },*/
    };
    var messages = {
        _sitename: {
            minlength: '网站名称至少4个字符。',
            required: '网站名称为必填项。'
        },
        _seo_keyword: {
            minlength: 'SEO关键词至少4个字符。',
            maxlength: 'SEO关键词不超过100个字符。',
            required: 'SEO关键词为必填项。'
        },
        _seo_desp: {
            minlength: 'SEO关键描述至少4个字符。',
            maxlength: 'SEO关键描述不超过200个字符。',
            required: 'SEO关键描述为必填项。'
        },
        _cust_serv_tel: {
            minlength: '客服电话至少9个字符。',
            required: '客服电话为必填项。'
        },
        _support_em: {
            required: '技术支持邮箱为必填项。',
            email: '技术支持邮箱格式错误。'
        },
        _cust_serv_em: {
            required: '客户服务邮箱为必填项。',
            email: '客户服务邮箱格式错误。'
        },
        _site_qq: {
            required: '官方QQ群为必填项。',
            number: '官方QQ群格式错误。'
        },
        _site_domain: {
            required: '网站域名为必填项。',
            minlength: '网站域名至少5个字符。'
        },
        _coin_type: {
            required: '虚拟货币类型为必填项。',
            minlength: '虚拟货币类型至少3个字符。',
            maxlength: '虚拟货币类型最多50个字符。'
        },
        _site_serv_qq: {
            required: '客服QQ为必填项。',
            number: '客服QQ格式错误。'
        },
        _site_record_num: {
            minlength: '网站备案号至少10个字符。',
            required: '网站备案号为必填项。'
        }
    };


</script>
<?php include("form.php"); ?>