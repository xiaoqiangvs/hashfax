<?php
namespace backend\controllers;

use backend\models\ZfbCust;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Cust controller 客户
 */
class CustController extends AuthController
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
            //获取搜索客户
            'getlist'=>[
                'class'=>'backend\actions\GetCustListAction'
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $url = Url::toRoute(["cust/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
            "handleValidation2('saveForm')",
            //"handleValidation('".Url::toRoute(["company-shop/update"])."','".Url::toRoute(["company-shop/index"])."');"
        ];
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
        if(isset($post['cust_id']) && $post['cust_id']){
            $model = ZfbCust::findOne($post['cust_id']);
            $model->utime = date('Y-m-d H:i:s');

            if ($model->load($post,'') && $model->save()) {
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }else{
            $model = new ZfbCust();
            $model->cust_name = trim($post['cust_name']);
            $model->cust_alias = $post['cust_alias'];
            $model->cust_sex = $post['cust_sex'];
            $model->account = $post['account'];
            $model->passwd = $post['passwd'];
            $model->cust_phone = trim($post['cust_phone']);
            $model->cust_email = trim($post['cust_email']);

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
            //ZfbCust::deleteAll(['cust_id' => $post['id']]);
            ZfbCust::updateAll(['is_del' => 1], ['cust_id' => $id]);
            return ApiReturn::success('删除成功');
        }else{
            return ApiReturn::wrongParams('删除失败');
        }
    }
}
