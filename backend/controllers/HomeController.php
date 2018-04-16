<?php
namespace backend\controllers;

use backend\models\ZfbSystem;
use common\models\ApiReturn;
use Yii;
use yii\helpers\Url;

/**
 * Home controller 网站设置
 */
class HomeController extends AuthController
{
    public $data = null;
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $res = ZfbSystem::find()->asArray()->all();
        $data = $this->data;
        foreach($res as $key =>$val){
            $data[$val['sys_var']] = $val['sys_value'];
        }
        $initJs = [
            "handleValidation2('saveForm')",
        ];
        $this->addJs(['form']);
        $this->addInitJs($initJs);
        return $this->render('index', $data);
    }

    /**
     * Modify
     *
     * @return string
     */
    public function actionModify(){
        $param = Yii::$app->request->post();
        if($param){
            $res = ZfbSystem::find()->asArray()->all();
            foreach($res as $key => $val){
                ZfbSystem::updateAll(['sys_value' => $param[$val['sys_var']]], ['sys_var' => $val['sys_var']]);
            }
            return ApiReturn::success('保存成功');
        }
    }

    public function actionUpdate(){
        $param = Yii::$app->request->post();
        $model = new ZfbSystem();
        $model->sys_var = $param['sys_var'];
        $model->sys_value = $param['sys_value'];
        $model->sys_desp = $param['sys_desp'];
        $model->display = '1';
        $result = $model->save();
        if($result){
            return ApiReturn::success('添加成功');
        }else{
            return ApiReturn::wrongParams('添加失败');
        }
    }
}
