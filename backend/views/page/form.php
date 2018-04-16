<?php

/* @var $this yii\web\View */
use \yii\helpers\Url;

$this->title = ' - 页面编辑';
?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?=Url::toRoute('page/index')?>">页面管理</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>页面编辑</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> 页面编辑
    <small>发布 & 编辑</small>
</h3>
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <form action="#" id="saveForm" method="post" data-save="<?=Url::toRoute("page/update")?>" data-rec="<?=Url::toRoute("page/index")?>" class="form-horizontal" enctype="multipart/form-data">
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
                                <input type="text" name="page_title" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['page_title'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">英文标题
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="page_title_en" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['page_title_en'];}?>"/>
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
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="page_author" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['page_author'];}?>"/>
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
                                <script type="text/plain" id="page_content" name="page_content" style="width:100%;height:240px;">
                                    <?php if($attr){echo $attr['page_content'];} ?>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">SEO关键词英文
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="meta_keyword_en" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['meta_keyword_en'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-1">SEO描述英文
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-8">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input type="text" name="meta_desp_en" maxlength="50" class="form-control" value="<?php if($attr){echo $attr['meta_desp_en'];}?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group last">
                        <label class="control-label col-md-1">内容英文
                            <span class="required"></span>
                        </label>
                        <div class="col-md-8">
                            <!--<textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error"></textarea>
                            <div id="editor2_error"> </div>-->
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <script type="text/plain" id="page_content_en" name="page_content" style="width:100%;height:240px;">
                                    <?php if($attr){echo $attr['page_content_en'];} ?>
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
                    <input class='hide' type="text" name="page_id" value="<?php if($attr){echo $attr['page_id'];}?>"/>
                    <button type="submit" id="formSubmit" class="btn green">发布</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END PAGE BASE CONTENT -->


<script type="text/javascript">
    var rules = {
        page_title:{
            minlength: 3,
            required: true
        },
        page_title_en:{
            minlength: 3,
            required: true
        },
        page_author:{
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
        page_content:{
            required: true
        },
        meta_keyword_en:{
            minlength: 5,
            required: true
        },
        meta_desp_en:{
            minlength: 5,
            required: true
        },
        page_content_en:{
            required: true
        }
    };
    var messages = {
        page_title:{
            minlength: '标题至少3个字符。',
            required: '标题为必填项。'
        },
        page_title_en:{
            minlength: '英文标题至少3个字符。',
            required: '英文标题为必填项。'
        },
        page_author:{
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
        page_content:{
            required: '文章内容为必填项。'
        },
        meta_keyword_en:{
            minlength: '英文SEO关键词至少5个字符。',
            required: '英文SEO关键词为必填项。'
        },
        meta_desp_en:{
            minlength: '英文SEO描述至少5个字符。',
            required: '英文SEO描述为必填项。'
        },
        page_content_en:{
            required: '英文文章内容为必填项。'
        }
    };
    var initEditor = function(){
        var um = UM.getEditor('page_content',{
            imageUrl: "<?=Url::toRoute("article/upload")?>",
            imagePath: "<?=$imghost?>",
            imageFieldName: "file"
        });
        var um2 = UM.getEditor('page_content_en',{
            imageUrl: "<?=Url::toRoute("article/upload")?>",
            imagePath: "<?=$imghost?>",
            imageFieldName: "file"
        });
    }
</script>
