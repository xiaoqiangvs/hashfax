<?php
namespace backend\controllers;

use backend\models\ZfbProd;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Prod controller 产品
 */
class ProdController extends AuthController
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
                'class' => 'backend\actions\GetProdListAction',
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
        $url = Url::toRoute(["prod/getlist"]);
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
        if(isset($post['prod_id']) && $post['prod_id']){
            $model = ZfbProd::findOne($post['prod_id']);
            $model->utime = date('Y-m-d H:i:s');
            $model->uid = 1;

            if ($model->load($post,'') && $model->save()) {
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }else{
            $model = new ZfbProd();
            $model->prod_name = trim($post['prod_name']);
            $model->suanli = $post['suanli'];

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

    public function actionDelete($id){
        if($id){
            //ZfbCust::deleteAll(['cust_id' => $post['id']]);
            ZfbProd::updateAll(['is_del' => 1], ['prod_id' => $id]);
            return ApiReturn::success('删除成功');
        }else{
            return ApiReturn::wrongParams('删除失败');
        }
    }
}
