<?php
namespace backend\controllers;

use backend\models\ZfbGoods;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Goods controller 商品
 */
class GoodsController extends AuthController
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
                'class' => 'backend\actions\GetGoodsListAction'
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
        $url = Url::toRoute(["goods/getlist"]);
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
        $post = Yii::$app->request->post();
        if(isset($post['good_id']) && $post['good_id']){
            $model = ZfbGoods::findOne($post['good_id']);
            $model->utime = date('Y-m-d H:i:s');
            $model->uid = 1;

            if ($model->load($post,'') && $model->save()) {
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }else{
            $model = new ZfbGoods();
            $model->good_title = trim($post['good_title']);
            $model->good_price = $post['good_price'];
            $model->sign_calc = $post['sign_calc'];
            $model->store = $post['store'];
            $model->opentime = $post['opentime'];
            $model->zuli_days = trim($post['zuli_days']);
            $model->huiben_days = trim($post['huiben_days']);
            $model->synchro = $post['synchro'];

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

    public function actionFlag(){
        $post = Yii::$app->request->post();
        foreach ($post['id'] as $key => $val){
            $model = ZfbGoods::findOne($val);
            $model->flag = $post['flag'];
            $result = $model->save();
        }
        $str = $post['flag']==0? '上架': '下架';
        if($result){
            return ApiReturn::success($str.'成功');
        }else{
            return ApiReturn::success($str.'失败');
        }
    }

    public function actionDelete($id){
        if($id){
            //ZfbCust::deleteAll(['cust_id' => $post['id']]);
            ZfbGoods::updateAll(['is_del' => 1], ['good_id' => $id]);
            return ApiReturn::success('删除成功');
        }else{
            return ApiReturn::wrongParams('删除失败');
        }
    }
}
