<?php
namespace common\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Controller;

/**
 * Common controller
 */
class CommonController extends Controller
{
    public $host = '';
    public $fronthost = '';
    public $imghost = '';
    public $css = null;
    public $js = null;
    public $headJs = null;
    public $footerJs = null;
    public $initJs = null;
    public $crumbs = "";
    public $curMenuItem = null;
    private $rl = ["result" => 0, "message" => ""];

    public function init()
    {
        parent::init();
        $this->host = Yii::$app->params['admin_host'];
        $this->fronthost = Yii::$app->params['front_host'];
        $this->imghost = Yii::$app->params['img_host'];
        $this->css = [
        ];
        $this->js = [
        ];
        $this->headJs = [
        ];
        $this->footerJs = [
        ];
        $this->initJs = [
        ];
    }

    public function addCss(array $type = ['table'], array $css_urls = null)
    {
        $css = [
            '/metronic/global/plugins/select2/css/select2.min.css',
            '/metronic/global/plugins/select2/css/select2-bootstrap.min.css',
            //'/metronic/global/plugins/bootstrap-select/css/bootstrap-select.min.css',
        ];
        $this->css = array_merge($this->css, $css);
        if(in_array('table', $type)){
            $css = [
                '/metronic/global/plugins/datatables/datatables.min.css',
                '/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
                '/metronic/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
//            $this->host . '/metronic/global/css/plugins.min.css',
//            $this->host . '/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
            ];
            $this->css = array_merge($this->css, $css);
        }
        if ($css_urls) {
            $this->css = array_merge($this->css, $css_urls);
        }
    }

    public function addJs(array $type = ['table'], array $js_urls = null)
    {
        $js = [
            '/metronic/global/plugins/bootbox/bootbox.min.js',
            //'/metronic/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
            //'/metronic/pages/scripts/components-bootstrap-select.min.js',
            '/metronic/global/plugins/select2/js/select2.full.min.js',
            '/metronic/pages/scripts/components-select2.js',
        ];
        $this->js = array_merge($this->js, $js);
        if(in_array('table', $type)){
            $js = [
                '/metronic/global/scripts/datatable.js',
                '/metronic/global/plugins/datatables/datatables.min.js',
                '/metronic/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
                '/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                '/metronic/pages/scripts/table-datatables-ajax.js',
                '/js/common.js',
                //$this->host . '/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
            ];
            $this->js = array_merge($this->js, $js);
        }
        //if(in_array('form', $type)){
            $js = [
                '/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js',
                '/js/jquery.form.js',
                '/js/cust.form.js',
            ];
            $this->js = array_merge($this->js, $js);
        //}
        if ($js_urls) {
            $this->js = array_merge($this->js, $js_urls);
        }
    }

    public function addHeadJs(array $js_urls){
        if($js_urls){
            $this->headJs = array_merge($this->headJs, $js_urls);
        }
    }

    public function addFooterJs(array $footer_js){
        if($footer_js){
            $this->footerJs = array_merge($this->footerJs,$footer_js);
        }
    }

    public function addInitJs(array $initJs)
    {
        if ($initJs) {
            $this->initJs = array_merge($this->initJs, $initJs);
        }
    }

    protected function _error($message, $code = 0)
    {
        $this->rl["code"] = $code;
        $this->rl["msg"] = $message;
        echo Json::encode($this->rl);
        die();
    }

    protected function _success($message, $code = 1)
    {
        $this->rl["code"] = $code;
        $this->rl["msg"] = $message;
        echo Json::encode($this->rl);
        die();
    }

    protected function _user()
    {
        $session = Yii::$app->session;
        return $session->get('user');
    }

    public function renderError($message)
    {
        $errorMsg = '<div style="width:100%; float:left; text-align:center; font-size:24px; color: red; padding-top:5%;"><span>'.$message.'</span></div>';
        return $this->renderContent($errorMsg);
    }
}