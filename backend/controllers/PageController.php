<?php
namespace backend\controllers;

use backend\models\ZfbNotice;
use backend\models\ZfbPage;
use common\models\ApiReturn;
use common\helps\Upload;
use Yii;
use yii\helpers\Url;

/**
 * Page controller 页面
 */
class PageController extends AuthController
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
                'class' => 'backend\actions\GetPageListAction'
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
        $url = Url::toRoute(["page/getlist"]);
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
            $model = ZfbPage::findOne($id);
            $attr = $model->getAttributes();
            $data['attr'] = $attr;
        }

        return $this->render('form', $data);
    }

    public function actionUpdate(){
        $param = Yii::$app->request->post();

        if (Yii::$app->request->isPost){
            /*preg_match("<img.*?src=\"(.*?.*?)\".*?>",$param['content'],$match);*/

            if(isset($param['page_id']) && $param['page_id']){
                $model = ZfbPage::findOne($param['page_id']);
                $model->uid = 1;
                //$model->cover = isset($match[1]) ? $match[1] : '';

                //unset($param['member_id']);
                $model->utime = date('Y-m-d H:i:s');
                if ($model->load($param,'') && $model->save()) {
                    return ApiReturn::success('保存成功');
                }
            }else{
                $model = new ZfbPage();

                //$model->member_id = trim($param['shop_name']);
                $model->page_author = trim($param['page_author']);
                $model->page_title = trim($param['page_title']);
                $model->meta_keyword = trim($param['meta_keyword']);
                $model->meta_desp = trim($param['meta_desp']);
                $model->page_content = trim($param['page_content']);
                $model->page_title_en = trim($param['page_title_en']);
                $model->meta_keyword_en = trim($param['meta_keyword_en']);
                $model->meta_desp_en = trim($param['meta_desp_en']);
                $model->page_content_en = trim($param['page_content_en']);
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
