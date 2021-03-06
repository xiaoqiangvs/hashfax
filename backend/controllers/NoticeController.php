<?php
namespace backend\controllers;

use backend\models\ZfbNotice;
use common\models\ApiReturn;
use common\helps\Upload;
use Yii;
use yii\helpers\Url;

/**
 * Site controller
 */
class NoticeController extends AuthController
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
                'class' => 'backend\actions\GetNoticeListAction'
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
        $url = Url::toRoute(["notice/getlist"]);
        $initJs = [
            "TableDatatablesAjax.init('".$url."');",
        ];

        $this->addCss();
        $this->addJs();
        $this->addInitJs($initJs);
        return $this->render('index');
    }

    /**
     * @return \common\models\json
     */
    public function actionEdit($id = null){
        $css = [
            '/umeditor/default/_css/umeditor.css',
        ];
        $js = [
            '/umeditor/umeditor.config.js',
            '/umeditor/editor_api.js',
            '/umeditor/lang/zh-cn/zh-cn.js',
            //$this->host . '/js/article.js',
        ];

        $initJs = [
            //"handleValidation();",
            "initEditor();",
            "handleValidation2('saveForm')",
        ];

        $this->addCss([], $css);
        $this->addJs(['form'], $js);
        $this->addInitJs($initJs);

        $data['attr'] = '';
        $data['imghost'] = $this->imghost;
        if($id){
            $model = ZfbNotice::findOne($id);
            $attr = $model->getAttributes();
            $data['attr'] = $attr;
        }

        return $this->render('form', $data);
    }

    public function actionUpdate(){
        $param = Yii::$app->request->post();

        if (Yii::$app->request->isPost){
            /*preg_match("<img.*?src=\"(.*?.*?)\".*?>",$param['content'],$match);*/

            if(isset($param['notice_id']) && $param['notice_id']){
                $model = ZfbNotice::findOne($param['notice_id']);
                $model->uid = 1;
                //$model->cover = isset($match[1]) ? $match[1] : '';

                //unset($param['member_id']);
                $model->utime = date('Y-m-d H:i:s');
                if ($model->load($param,'') && $model->save()) {
                    return ApiReturn::success('保存成功');
                }
            }else{
                $model = new ZfbNotice();

                //$model->member_id = trim($param['shop_name']);
                $model->notice_title = trim($param['notice_title']);
                $model->notice_author = trim($param['notice_author']);
                $model->meta_keyword = trim($param['meta_keyword']);
                $model->meta_desp = trim($param['meta_desp']);
                $model->notice_content = trim($param['notice_content']);
                $model->lang = $param['lang'];
                $model->cid = 1;
                $model->uid = 1;
                $model->ctime = date('Y-m-d H:i:s');
                $model->utime = date('Y-m-d H:i:s');
                $model->is_del = 0;

                $model->save();
                //echo $model;

                //$this->redirect("article/index");
                return ApiReturn::success('保存成功');
            }
        }else{
            return ApiReturn::wrongParams('保存失败');
        }
    }

    public function actionUpload(){
        $return = Upload::uploadArticleImage();
        if($return['code'] == 1){
            $fullArr = explode('/', $return['data']['full']);
            $data = array(
                "name" => $fullArr[count($fullArr) -1],
                "originalName" => $return['filename'] ,
                "url" => $return['data']['full'] ,
                "size" => $return['size'] ,
                "type" => strtolower( strrchr( $return['filename'] , '.' ) ) ,
                "state" => 'SUCCESS'
            );

            // 将图片保存到公共图片库中
            $fileModel = new ZfbFile();
            $fileModel->file_path = $return['data']['full'];
            $fileModel->status = -1;
            $fileModel->type = 'page';
            $fileModel->ctime = date('Y-m-d H:i:s');
            if(!$fileModel->save()){         //保存不成功
                //$errors = $fileModel->getErrors();
                //throw new \RuntimeException('保存失败.'.$model::getModelError($model));
                return ApiReturn::wrongParams('保存失败');
            }
            return json_encode($data);
            //return ApiReturn::success('图片保存成功', $data);
        }else{
            return ApiReturn::wrongParams('图片保存失败');
        }
    }
}
