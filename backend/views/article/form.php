<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 文章编辑';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=Url::toRoute('article/index')?>">新闻资讯</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>文章编辑</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 文章编辑
    <small>发布 & 编辑</small>
</h3>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <form action="#" id="saveForm" method="post" data-save="<?=Url::toRoute("article/update")?>" data-rec="<?=Url::toRoute("article/index")?>" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-body">
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button> 表单有错误，请检查。 </div>
            <div class="alert alert-success display-hide">
                <button class="close" data-close="alert"></button> 表单验证通过！ </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">标题
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="news_title" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['news_title'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">语言
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="mt-radio-inline" style="padding-bottom:0px;">
                                <label class="mt-radio" style="margin-bottom:0px;">
                                    <input type="radio" name="lang" value="zh-cn" <?php if($attr){echo $attr['lang'] != 'en' ? 'checked': '' ;}else{ echo 'checked';}?> /> 中文
                                    <span></span>
                                </label>
                                <label class="mt-radio" style="margin-bottom:0px;">
                                    <input type="radio" name="lang" value="en" <?php if($attr){echo $attr['lang'] == 'en' ? 'checked': '' ;}?>/> English
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">发布人
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-5">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="news_author" maxlength="50" class="form-control input-medium" value="<?php if($attr){echo $attr['news_author'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">SEO关键词
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="meta_keyword" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['meta_keyword'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">SEO描述
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="meta_desp" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['meta_desp'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group last">
                        <label class="control-label col-md-1">内容
                            <span class="required"></span>
                        </label>
                        <div class="col-md-8">
                            <!--<textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error"></textarea>
                            <div id="editor2_error"> </div>-->
                            <div class="input-icon right">
                                <i class="fa"></i>
                            <script type="text/plain" id="news_content" name="news_content" style="width:100%;height:240px;">
                                 <?php if($attr){echo $attr['news_content'];} ?>
                            </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-1 col-md-9">
                    <input name="_csrf-backend" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
                    <input class='hide' type="text" name="news_id" value="<?php if($attr){echo $attr['news_id'];}?>"/>
                    <button type="submit" id="formSubmit" class="btn green">发布</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END PAGE BASE CONTENT -->


<script type="text/javascript">
    var rules = {
        news_title:{
            minlength: 5,
            required: true
        },
        news_author:{
            minlength: 2,
            required: true
        },
        meta_keyword:{
            minlength: 5,
            required: true
        },
        meta_desp:{
            minlength: 5,
            required: true
        },
        news_content:{
            required: true
        }
    };
    var messages = {
        news_title:{
            minlength: '标题至少5个字符。',
            required: '标题为必填项。'
        },
        news_author:{
            minlength: '发布人至少2个字符。',
            required: '发布人为必填项。'
        },
        meta_keyword:{
            minlength: 'SEO关键词至少5个字符。',
            required: 'SEO关键词为必填项。'
        },
        meta_desp:{
            minlength: 'SEO描述至少5个字符。',
            required: 'SEO描述为必填项。'
        },
        news_content:{
            required: '文章内容为必填项。'
        }
    };
    var initEditor = function(){
        var um = UM.getEditor('news_content',{
            imageUrl: "<?=Url::toRoute("article/upload")?>",
            imagePath: "<?=$imghost?>",
            imageFieldName: "file"
        });
    }
</script>
