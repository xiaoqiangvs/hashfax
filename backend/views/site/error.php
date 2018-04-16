<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?=Url::toRoute('site/index')?>">首页</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?= Html::encode($this->title) ?></span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> <?= nl2br(Html::encode($message)) ?>
    <small><?= Html::encode($this->title) ?></small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12 page-404">
        <div class="number font-green"> 404 </div>
        <div class="details">
            <h3>Oops! You're lost.</h3>
            <p> 我们找不到你需要查看的页面。
                <br/>
                <a href="<?=Url::toRoute('site/index')?>">返回首页</a>或者试着查看左边栏菜单。 </p>
        </div>
    </div>
</div>