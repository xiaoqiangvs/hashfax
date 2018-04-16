<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;

/**
 * Order controller 订单
 */
class OrderController extends AuthController
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
                'class' => 'backend\actions\GetCustOrdersListAction'
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
        $url = Url::toRoute(["order/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
        ];

        $this->addCss();
        $this->addJs();
        $this->addInitJs($initJs);
        return $this->render('index');
    }


}
