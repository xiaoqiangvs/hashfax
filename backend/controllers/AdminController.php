<?php
namespace backend\controllers;

use backend\models\ZfbAdmin;
use common\models\gii\ZfbAdminGii;
use Yii;
use yii\helpers\Url;
use common\models\ApiReturn;

/**
 * Account controller 虚拟账号
 */
class AdminController extends AuthController
{
    public $enableCsrfValidation=false;

    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionModify()
    {
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $model = ZfbAdmin::findOne(1);
            $model->setPassword($param['password']);

            if($model->save()){
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }
    }


}
