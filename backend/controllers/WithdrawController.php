<?php
namespace backend\controllers;

use backend\models\ZfbCustFinance;
use backend\models\ZfbCustFinanceLog;
use Yii;
use yii\helpers\Url;

/**
 * Withdraw controller 提现
 */
class WithdrawController extends AuthController
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
            ],
            'getlist' => [
                'class' => 'backend\actions\GetWithdrawListAction'
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $url = Url::toRoute(["withdraw/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
            "handleValidation2('saveForm')",
        ];

        $this->addCss();
        $this->addJs(['table', 'form']);
        $this->addInitJs($initJs);
        return $this->render('index');
    }


    public function actionUpdate(){
        $param = Yii::$app->request->post();
        if(isset($param['log_id'])){
           $model = ZfbCustFinanceLog::findOne($param['log_id']);
           $model->status = 1;
           $model->desp = trim($param['desp']);
           $amount = $model->amount;
           $coin_id = $model->coin_id;
           $cust_id = $model->account_id;
           if($model->save()){
               $res = ZfbCustFinance::find()->where(['cust_id' => $cust_id, 'coin_id' => $coin_id])->asArray()->one();

               $balance = $res['balance'] - $amount;
               $custFinance = ZfbCustFinance::findOne($res['finance_id']);
               $custFinance->balance = $balance;
               if($custFinance->save()){
                   return ApiReturn::success('提现成功，并成功扣款');
               }else{
                   return ApiReturn::wrongParams('提现成功，但扣款失败');
               }
           }else{
               return ApiReturn::wrongParams('提交失败');
           }
        }else{
            return ApiReturn::wrongParams('提交失败');
        }
    }

}
