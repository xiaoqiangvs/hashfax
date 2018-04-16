<?php

namespace backend\controllers;

use backend\models\ZfbAdmin;
use common\controllers\CommonController;
use common\models\ApiReturn;
use Yii;
//use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use common\helps\Tools;
//use common\helps\Upload;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class LoginController extends CommonController
{
    public $layout = false;
    //public $enableCsrfValidation=true;


    /**
     * @return string
     * 登录页面
     */
    public function actionIndex()
    {
        $initJs = [
            "handleValidation2('loginForm')",
        ];
        $this->addJs(['form']);
        $this->addInitJs($initJs);
        return $this->render('index');
    }

    /**
     *
     */
    public function actionIn()
    {
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $account = $param['account'];
            $passwd = $param['password'];

            if($param['account']){
                $model = new ZfbAdmin();
                $res = $model->find()->where(['account' => $account])->asArray()->one();
                if($res){
                    if($model->validatePassword($passwd, $res['passwd'])){
                        $user = array(
                            'user_id' => $res['admin_id'],
                            'account' => $res['account'],
                            'expire_time' => time() + 3600  // 1小时过期
                        );
                        Yii::$app->session->set('user', $user);
                        return ApiReturn::success('登录成功');
                    }else{
                        return ApiReturn::wrongParams('账号或密码错误');
                    }
                }else{
                    return ApiReturn::wrongParams('账号不存在');
                }
            }else{
                return ApiReturn::wrongParams('账号不能为空');
            }
        }else{
            $this->redirect('login/index');
        }
    }

    public function actionOut(){
        $session = Yii::$app->session;
        if ($session->isActive){
            Yii::$app->session->removeAll();
            Yii::$app->session->close();
            Yii::$app->session->destroy();
        }
        $this->redirect(['login/index']);
    }

}
