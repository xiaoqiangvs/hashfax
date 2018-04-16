<?php
namespace backend\controllers;

use backend\models\ZfbCustFinance;
use backend\models\ZfbCustFinanceLog;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Recharge controller 充值
 */
class RechargeController extends AuthController
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
                'class' => 'backend\actions\GetRechargeListAction'
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
        $url = Url::toRoute(["recharge/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
        ];

        $this->addCss();
        $this->addJs();
        $this->addInitJs($initJs);
        return $this->render('index');
    }

    /**
     * @return array|\common\models\json 手动充值
     */
    public function actionUpdate(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $model = new ZfbCustFinanceLog();
            $model->account_id = $param['account_id'];
            $model->coin_id = $param['coin_id'];
            $model->amount = $param['amount'];
            $model->flag = 0;
            $model->ctime = $param['ctime'];
            $model->utime = date('Y-m-d H:i:s');
            $model->desp = $param['desp'];
            $model->cust_id = $param['cust_id'];
            if($model->save()){
                $res = ZfbCustFinance::find()->where(['cust_id' => $param['cust_id'], 'coin_id' => $param['coin_id']])->asArray()->one();

                $balance = $res['balance'] + $param['amount'];
                $custFinance = ZfbCustFinance::findOne($res['finance_id']);
                $custFinance->balance = $balance;
                if($custFinance->save()){
                    return ApiReturn::success('提交成功');
                }else{
                    return ApiReturn::wrongParams('提交失败');
                }

            }else{
                return ApiReturn::wrongParams('提交失败');
            }
        }else{
            $this->redirect('recharge/index');
        }

    }

}
