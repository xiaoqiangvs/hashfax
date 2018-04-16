<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'bootstrap/css/bootstrap.css',
        'fonts/font-awesome/css/font-awesome.css',
        'fonts/fontello/css/fontello.css',
        'plugins/rs-plugin/css/settings.css',
        'plugins/rs-plugin/css/extralayers.css',
        'plugins/magnific-popup/magnific-popup.css',
        'css/animations.css',
        'plugins/owl-carousel/owl.carousel.css',
        'css/style.css',
        'css/skins/red.css',
        'css/custom.css',
        //'css/components.min.css'
    ];
    public $js = [
        //<!--Jquery Script-->
        'plugins/jquery.min.js',
        'bootstrap/js/bootstrap.min.js',
        'plugins/modernizr.js',
        'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
        'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'plugins/isotope/isotope.pkgd.min.js',
        'plugins/owl-carousel/owl.carousel.js',
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
        'plugins/jquery.appear.js',
        'plugins/jquery.countTo.js',
        'plugins/jquery.parallax-1.1.3.js',
        'plugins/jquery.validate.js',
        'js/jquery.form.js',
        'js/clipboard.min.js',
        'js/template.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
