<?php
namespace backend\controllers;

use backend\models\ZfbCoin;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Site controller
 */
class CoinController extends AuthController
{
    public $enableCsrfValidation = false;
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
                'class' => 'backend\actions\GetCoinListAction'
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
        $url = Url::toRoute(["coin/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
            "handleValidation2('saveForm')",
        ];

        $this->addCss();
        $this->addJs(['table', 'form']);
        $this->addInitJs($initJs);

        return $this->render('index');
    }


    /**
     *
     * @return string
     */
    public function actionUpdate(){
        $post = Yii::$app->request->post();
        if(isset($post['coin_id']) && $post['coin_id']){
            $model = ZfbCoin::findOne($post['coin_id']);
            $model->utime = date('Y-m-d H:i:s');

            if ($model->load($post,'') && $model->save()) {
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }else{
            $model = new ZfbCoin();
            $model->coin_type = trim($post['coin_type']);
            $model->coin_addr = trim($post['coin_addr']);
            $model->coin_url = trim($post['coin_url']);
            $model->coin_desp = trim($post['coin_desp']);
            $model->sort = trim($post['sort']);

            $model->cid = 1;//$this->_user['admin_id'];//$user['user_id'];
            $model->uid = 1;//$this->_user['admin_id'];//$user['user_id'];
            $model->ctime = date('Y-m-d H:i:s');
            $model->utime = date('Y-m-d H:i:s');
            $model->is_del = 0;
            $result = $model->save();
            if($result){
                return ApiReturn::success('添加成功');
            }else{
                return ApiReturn::wrongParams('添加失败');
            }
        }
    }

    /**
     *
     */
    public function actionDelete($id){
        if($id){
            ZfbCoin::deleteAll(['id' => $id]);
            //ZfbCoin::updateAll(['is_del' => 1], ['cust_id' => $id]);
            return ApiReturn::success('删除成功');
        }else{
            return ApiReturn::wrongParams('删除失败');
        }
    }
}
