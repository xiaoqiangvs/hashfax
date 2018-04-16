<?php
namespace backend\controllers;

//use backend\models\CommLog;
//use common\models\CommSetting;
use backend\models\ZfbCustOrders;
use backend\models\ZfbCustRecharge;
use backend\models\ZfbWithdrawCash;
use Yii;
use common\controllers\CommonController;
use yii\helpers\Url;

/**
 * Auth controller 验证
 */
class AuthController extends CommonController
{
    protected $_user = null;
    protected $_setting = null;
    public $ss = null;
    public $rechargeList = null;
    public $withDrawCashList = null;
    public $ordersList = null;

    public function beforeAction($action)
    {
        $view = Yii::$app->getView();
        $view->params['publicTitle'] = '鑫创风云';
        $session = Yii::$app->session;
        //$session->set('user', '1');
        $this->_user = $session->get('user');
        if(empty($this->_user)){
            if(Yii::$app->request->isAjax){
                echo json_encode(['code'=>1,'message'=>'亲爱的用户，请先登录哦！','data'=>Url::toRoute(['login/index'])]);
                exit();
            }
            $this->redirect(['login/index']);
            return;
        }


        $initJs = [
            "handleValidation2('modifyPasswdForm', modMessages, modRules)",
        ];
        $this->addInitJs($initJs);

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
