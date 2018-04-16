<?php
namespace backend\controllers;

use backend\models\ZfbNav;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Site controller
 */
class NavController extends AuthController
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
                'class' => 'backend\actions\GetNavListAction'
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
        $url = Url::toRoute(["nav/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
            "handleValidation2('saveForm')",
        ];

        $this->addCss();
        $this->addJs(['table', 'form']);
        $this->addInitJs($initJs);

        $subMenu = ZfbNav::find()->where(['nav_level' => 1])->asArray()->all();
        return $this->render('index', array('subMenu' => $subMenu));
    }


    /**
     *
     * @return string
     */
    public function actionUpdate(){
        $post = Yii::$app->request->post();
        if(isset($post['nav_id']) && $post['nav_id']){
            $model = ZfbNav::findOne($post['nav_id']);
            $model->utime = date('Y-m-d H:i:s');
            unset($post['rel_nav_id']);
            $model->rel_nav_id = isset($post['rel_nav_id']) ? join(',', $post['rel_nav_id']) : '';

            if ($model->load($post,'') && $model->save()) {
                return ApiReturn::success('修改成功');
            }else{
                return ApiReturn::wrongParams('修改失败');
            }
        }else{
            $model = new ZfbNav();
            $model->nav_name = trim($post['nav_name']);
            $model->nav_name_en = trim($post['nav_name_en']);
            $model->sort = trim($post['sort']);
            $model->nav_ctrl = $post['nav_ctrl'];
            $model->nav_url = $post['nav_url'];
            $model->nav_level = $post['nav_level'];
            $model->display_sub = $post['display_sub'];
            $model->display = $post['display'];
            $model->rel_nav_id = isset($post['rel_nav_id']) ? join(',', $post['rel_nav_id']) : '';

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
            ZfbNav::deleteAll(['id' => $id]);
            //ZfbNav::updateAll(['is_del' => 1], ['cust_id' => $id]);
            return ApiReturn::success('删除成功');
        }else{
            return ApiReturn::wrongParams('删除失败');
        }
    }
}
