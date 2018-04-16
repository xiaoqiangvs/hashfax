<?php
namespace frontend\controllers;

use backend\models\ZfbGoods;
use backend\models\ZfbNav;
use backend\models\ZfbPage;
use backend\models\ZfbSystem;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller
 */
class GoodsController extends Controller
{
    //protected $navList = array();
    protected $data = null;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        $view = Yii::$app->getView();
        $view->params['navList'] = ZfbNav::find()->where(['nav_ctrl' => 'nav'])->asArray()->orderBy('sort asc')->all();
        $view->params['cur_ctrl_act'] = 'goods/index';
        $model = ZfbPage::findOne(3);
        $view->params['protocol'] = $model->getAttribute('page_content');

        // 网站配置
        $res = ZfbSystem::find()->asArray()->all();
        foreach($res as $key =>$val){
            $view->params[$val['sys_var']] = $val['sys_value'];
        }
        return parent::beforeAction($action);
    }

    // 商品列表
    public function actionIndex($s = 0){
        $recordTotal = ZfbGoods::find()->where(['is_del' => 0, 'flag' => 0])->count();
        $goods_list = ZfbGoods::find()->where(['is_del' => 0, 'flag' => 0])->asArray()->all();
        $data['s'] = $s;
        $data['recordTotal'] = $recordTotal;
        $data['goods_list'] = $goods_list;
        return $this->render('index', array('goods_list' => $goods_list));
    }

    // 商品详情
    public function actionDetail($id = null){
        $model = ZfbGoods::findOne($id);
        $attr = $model->getAttributes();
        return $this->render('detail', $attr);
    }
}
