<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class AuthController extends Controller
{
    protected $_cust = null;

    public function beforeAction($action)
    {
        $session = Yii::$app->session;
        /*$session->set('cust_id', '1');
        $session->set('cust', 'jialiu_1985@126.com');
        $session->set('cust_name', 'ceshi');
        $session->set('cust_alias', 'alias');
        $session->set('cust_phone', '15950023569');
        $session->set('cust_email', 'jialiu_1985@126.com');
        $session->set('cust_has_lpwd', 1);
        $session->set('cust_has_spwd', 0);
        $session->set('cust_has_email', 1);
        $session->set('cust_has_phone', 0);*/
        $this->_cust = $session->get('cust');
        if($this->_cust['expire_time'] < time()){
            $this->redirect(['site/logout'])->send();
        }
        if(empty($this->_cust)){
            if(Yii::$app->request->isAjax){
                echo json_encode(['code'=>1,'message'=>'亲爱的用户，请先登录哦！','data'=>Url::toRoute(['login/index'])]);
                exit();
            }
            $this->redirect(['site/index'])->send();
            return;
        }

        //加载系统配置项
        //$this->_setting = CommSetting::getCommSetting($this->_user['company_id']);

        //写系统日志
        /*$url = $_SERVER["REQUEST_URI"];
        $commlog = new CommLog();//var_dump($url);var_dump(substr_count($url,'index'));var_dump(strpos($url,'list'));die;
        if((substr_count($url,'index') <= 1) && strpos($url,'list') === false){
            $commlog->addLog($url,$this->_user);
        }*/

        return parent::beforeAction($action);
    }

}
