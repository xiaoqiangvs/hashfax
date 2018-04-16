<?php
namespace frontend\controllers;

use backend\models\Customer;
use backend\models\ZfbCust;
use backend\models\ZfbCustFinance;
use backend\models\ZfbNav;
use backend\models\ZfbNews;
use backend\models\ZfbNotice;
use backend\models\ZfbPage;
use backend\models\ZfbSystem;
use common\models\ApiReturn;
use dosamigos\qrcode\QrCode;
use frontend\models\RegForm;
use Yii;
use yii\base\InvalidParamException;
use yii\captcha\CaptchaValidator;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Controller;
use common\helps\Tools;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*'access' => [
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
            ],*/
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
            //验证码action
            'regcaptcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0x000000,//背景颜色
                'maxLength' => 5, //最大显示个数
                'minLength' => 4,//最少显示个数
                'padding' => 3,//间距
                'height'=>39,//高度
                'width' => 95,  //宽度
                'foreColor'=>0xffffff,     //字体颜色
                'offset'=>4        //设置字符偏移量 有效果
            ],
            'forgotcaptcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0x000000,//背景颜色
                'maxLength' => 5, //最大显示个数
                'minLength' => 4,//最少显示个数
                'padding' => 3,//间距
                'height'=>39,//高度
                'width' => 95,  //宽度
                'foreColor'=>0xffffff,     //字体颜色
                'offset'=>4        //设置字符偏移量 有效果
            ],
            'serseccaptcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0x000000,//背景颜色
                'maxLength' => 5, //最大显示个数
                'minLength' => 4,//最少显示个数
                'padding' => 3,//间距
                'height'=>39,//高度
                'width' => 95,  //宽度
                'foreColor'=>0xffffff,     //字体颜色
                'offset'=>4        //设置字符偏移量 有效果
            ],
            /*'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],*/
        ];
    }

    public function beforeAction($action)
    {
        $view = Yii::$app->getView();
        $view->params['navList'] = ZfbNav::find()->where(['nav_ctrl' => 'nav'])->asArray()->orderBy('sort asc')->all();
        $view->params['cur_ctrl_act'] = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
        $view->params['companyNav'] = ZfbNav::find()->where(['nav_ctrl' => 'company'])->asArray()->orderBy('sort asc')->all();
        $model = ZfbPage::findOne(3);
        $view->params['protocol'] = $model->getAttribute('page_content');

        // 网站配置
        $res = ZfbSystem::find()->asArray()->all();
        foreach($res as $key =>$val){
            $view->params[$val['sys_var']] = $val['sys_value'];
        }
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage. 首页
     *
     * @return mixed
     */
    public function actionIndex($lang = null)
    {
        //Yii::$app->language = '';
        //echo Yii::t('app', 'Goodbye_flag');
        $lang = $lang ? $lang : 'en';
        Yii::$app->session->set('language', $lang);
        Yii::$app->language =Yii::$app->session->get('language');
        return $this->render('index');
    }

    /**
     * Displays about page 公司简介.
     *
     * @return mixed
     */
    public function actionAbout($id = null)
    {
        $model = ZfbPage::findOne($id);
        $attr = $model->getAttributes();
        $attr['page_loc'] = '公司介绍';
        return $this->render('page', $attr);
    }

    // 联系方式
    public function actionContact($id = null){
        $model = ZfbPage::findOne($id);
        $attr = $model->getAttributes();
        $attr['page_loc'] = '联系我们';
        return $this->render('page', $attr);
    }

    // 服务协议
    public function actionProtocol($id = null){
        $model = ZfbPage::findOne($id);
        $attr = $model->getAttributes();
        $attr['page_loc'] = '服务协议';
        return $this->render('page', $attr);
    }

    // 公告列表
    public function actionNotice($s = 0){
        $recordTotal = ZfbNotice::find()->count();
        $noticeList = ZfbNotice::find()->limit(5)->offset($s)->asArray()->all();
        $data['s'] = $s;
        $data['recordTotal'] = $recordTotal;
        $data['noticeList'] = $noticeList;
        return $this->render('notice', $data);
    }

    // 公告详情
    public function actionDetail($id = 0){
        $model = ZfbNotice::findOne($id);
        $attr = $model->getAttributes();
        $view = Yii::$app->getView();
        $view->params['cur_ctrl_act'] = 'site/notice';
        return $this->render('detail', $attr);
    }

    // 新闻列表
    public function actionNews($s = 0){
        $recordTotal = ZfbNews::find()->count();
        $newList = ZfbNews::find()->limit(5)->offset($s)->asArray()->all();
        $data['s'] = $s;
        $data['recordTotal'] = $recordTotal;
        $data['noticeList'] = $newList;
        return $this->render('news', $data);
    }

    // 新闻详情
    public function actionArticle($id = null){
        $model = ZfbNews::findOne($id);
        $attr = $model->getAttributes();
        $view = Yii::$app->getView();
        $view->params['cur_ctrl_act'] = 'site/news';
        return $this->render('article', $attr);
    }

    /*public function actionSendTest(){
        $account = "531401078@qq.com";
        $code = Tools::autoCode();
        $data = array(
            'title' => '鑫创风云邮箱验证码',
            'to' => $account,
            'code' => $code,
        );
        $mail= Yii::$app->mailer->compose('verfiycode-html', $data);
        $mail->setTo($account); //要发送给那个人的邮箱
        $mail->setSubject("鑫创风云邮箱验证码"); //邮件主题
        //$mail->setTextBody('测试text'); //发布纯文字文本
        //$mail->setHtmlBody("测试html text"); //发送的消息内容
        if($mail->send()){
            $redis = Yii::$app->redis;
            $redis->set($account.'-autocaptcha', $code);

            return ApiReturn::success('发送成功');
        }else{
            return ApiReturn::wrongParams('发送失败');
        }
    }*/

    // 发送验证码测试
    /*public function actionTest (){
        $account = "531401078@qq.com";
        $code = Tools::autoCode();
        $data = array(
            'title' => '鑫创风云邮箱验证码',
            'to' => $account,
            'code' => $code,
        );
        $mail = Yii::$app->mail->compose('verfiycode-html', $data);
        $mail->setFrom(['jason@hashfax.com'=>'鑫创风云']);
        $mail->setSubject('鑫创风云邮箱验证码');
        $mail->setTo($account);
        //$mail->setTextBody('测试text');
        if($mail->send()){
            echo '发送成功';
        }else{
            echo '+++++++++++++';
        }
    }*/

    // 发送验证码
    public function actionSend(){
        //$param = Yii::$app->request->post();
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            /*if(!((isset($param['account']) && $param['account']) || Yii::$app->session->get('cust'))){
                return ApiReturn::success('发送失败');
            }*/
            if(isset($param['account']) && $param['account']){

            }elseif(Yii::$app->session->get('cust')){

            }else{
                return ApiReturn::success('发送失败');
            }
            $flag = $param['f'];
            $account = (isset($param['account']) && $param['account']) ? $param['account'] : Yii::$app->session->get('cust')['cust'];
            $code = Tools::autoCode();

            if(isset($param['phone']) && $param['phone']){ // 绑定手机号码时使用
                $phone = $param['phone'];
                if(Tools::checkPhone($phone)){
                    $redis = Yii::$app->redis;
                    $redis->set($account.'-autocaptcha-'.$flag, $code);
                    $redis->expire($account.'-autocaptcha-'.$flag, Yii::$app->params['captcha_expire']);
                    return ApiReturn::success('Phone发送成功-'.$code);
                }
            }
            if(Tools::checkEmail($account)){
                $data = array(
                    'title' => '鑫创风云邮箱验证码',
                    'to' => $account,
                    'code' => $code,
                );
                $mail = Yii::$app->mail->compose('verfiycode-html', $data);
                $mail->setFrom(['jason@hashfax.com'=>'鑫创风云']);
                $mail->setSubject('鑫创风云邮箱验证码');
                $mail->setTo($account);
                if($mail->send()){
                    $redis = Yii::$app->redis;
                    $redis->set($account.'-autocaptcha-'.$flag, $code);
                    $redis->expire($account.'-autocaptcha-'.$flag, Yii::$app->params['captcha_expire']);
                    return ApiReturn::success('Email发送成功-'.$code);
                }else{
                    return ApiReturn::wrongParams('验证码发送失败，邮箱不存在');
                }
            }elseif(Tools::checkPhone($account)){
                $response = Yii::$app->aliyun->sendSms(
                    "HashFax短信验证码", // 短信签名
                    "SMS_128875032", // 短信模板编号,注册
                    $account, // 短信接收者
                    Array(  // 短信模板中字段的值
                        "code"=>$code
                    )
                    //"123"
                );
                $json = json_decode($response);
                if($json->code == 104){
                    return ApiReturn::wrongParams('手机号码格式错误');
                }elseif($json->code == 200){
                    $redis = Yii::$app->redis;
                    $redis->set($account.'-autocaptcha-'.$flag, $code);
                    $redis->expire($account.'-autocaptcha-'.$flag, Yii::$app->params['captcha_expire']);
                    return ApiReturn::success('Phone发送成功-'.$code);
                }else {
                    return ApiReturn::wrongParams('发送验证码失败');
                }
            }else{
                return ApiReturn::wrongParams('手机号码或邮箱格式错误');
            }
        }else{ // 不是post传递的参数直接跳转到首页
            $this->redirect(['site/index']);
            //return ApiReturn::wrongParams('邮箱无法传递');
        }
    }

    // 发送短信验证码
    /*public function actionSms(){
        //$param = Yii::$app->request->post();
        //$param['to'] = '531401078@qq.com';
        $response = Yii::$app->aliyun->sendSms(
            "阿里云短信测试专用", // 短信签名
            "SMS_128875032", // 短信模板编号,注册
            "19692654027", // 短信接收者
            Array(  // 短信模板中字段的值
                "code"=>"12345"
            ),
            "123"
        );
        $json = json_decode($response);
        echo $json->code;
        print_r($response);
    }*/

    // 错误页面
    public function actionError(){
        return $this->render('error');
    }

    // 登录
    public function actionLogin(){
        $param = Yii::$app->request->post();
        if(Yii::$app->request->isPost && isset($param['account'])){
            $account = $param['account'];
            $model = new Customer();
            //$cond = ['password' => $model->getPassword($param['password'])];
            $cond = [];
            if(Tools::checkEmail($account) ){
                $cond['email'] = $account;
            }
            if(Tools::checkPhone($account)){
                $cond['phone'] = $account;
            }
            $res = $model->find()->where($cond)->one();
            if($res){
                if($model->validatePassword($param['password'], $res->password)){
                    $zfbCust = new ZfbCust();
                    $zfbRes = $zfbCust->find()->where(['customer_id' => $res->customer_id])->one();
                    $session = Yii::$app->session;
                    $cust = array(
                        'cust_id' => $zfbRes->cust_id,
                        'cust' => $account,
                        'cust_name' => $zfbRes->cust_name,
                        'cust_alias' => $zfbRes->cust_alias,
                        'cust_phone' => $zfbRes->cust_phone,
                        'cust_email' =>  $zfbRes->cust_email,
                        'cust_has_spwd' => $zfbRes->security_passwd ? 1 : 0,
                        'cust_has_email' => $zfbRes->cust_email ? 1 : 0,
                        'cust_has_phone' => $zfbRes->cust_phone ? 1 : 0,
                        'expire_time' => time() + 3600  // 1小时后过期
                    );
                    $session->set('cust', $cust);
                    return ApiReturn::success('登录成功');
                }else{
                    return ApiReturn::wrongParams('账号或密码错误');
                }
            }else{
                return ApiReturn::wrongParams('账号不存在');
            }
        }else{
            //return ApiReturn::wrongParams('登录失败');
            $this->redirect(['site/index']);
        }
    }

    // 验证码验证
    /*public function actionValidcaptcha(){

    }*/

    // 注册
    public function actionReg(){
        $params = Yii::$app->request->post();
        /*$res = $this->createAction('site/regcaptcha')->validate($params['captchaReg'], false);*/
        if(Yii::$app->request->isPost && isset($params['account'])){
            $account = $params['account'];
            $captcha = new CaptchaValidator();
            $captcha->captchaAction = 'site/regcaptcha';
            $res = $captcha->validate($params['captchaReg']);
            $errors = array();
            if(!(Tools::checkEmail($params['account']) || Tools::checkPhone($params['account']))){
                $errors[] = '手机或邮箱格式错误';
            }
            if($res == false){ // 验证码
                $errors[] = '图像验证码错误';
            }
            $redis = Yii::$app->redis;
            if(!$redis->get($params['account'].'-autocaptcha-reg')){
                $errors[] = '动态验证码不能为空';
            }else{
                if($redis->get($params['account'].'-autocaptcha-reg') != $params['autoCaptcha']){
                    $errors[] = '动态验证码错误';
                }
            }
            if($errors){
                return ApiReturn::wrongParams(join("\n", $errors));
            }else{ // 注册账号
                $customer = new Customer();
                $count = $customer::find()->where(['or', 'email="'.$account.'"', 'phone="'.$account.'"'])->count(); // 是否已存在账号
                if($count){
                    return ApiReturn::wrongParams('账号已存在，无法注册');
                }
                if(Tools::checkEmail($params['account']) ){
                    $customer->email = $account;
                }
                if(Tools::checkPhone($params['account'])){
                    $customer->phone = $account;
                }
                $customer->setPassword($params['password']);
                $customer->type = '1';
                $customer->status = 1;
                $customer->salt = '1';
                $time = date('Y-m-d H:i:s');
                $customer->ctime = $time;
                $customer->utime = $time;
                if(!$customer->save()){
                    //$errors = $customer->getErrors();
                    //var_dump($errors);
                    return ApiReturn::wrongParams('注册失败');
                }
                $customer_id = Yii::$app->db2->getLastInsertID();

                $zfbCust = new ZfbCust();
                $zfbCust->customer_id = $customer_id;
                if(Tools::checkEmail($params['account']) ){
                    $zfbCust->cust_email = $account;
                }
                if(Tools::checkPhone($params['account'])){
                    $zfbCust->cust_phone = $account;
                }
                $zfbCust->ctime = $time;
                $zfbCust->utime = $time;
                $zfbCust->is_del = 0;
                if(!$zfbCust->save()){
                    $errors = $zfbCust->getErrors();
                    var_dump($errors);
                    return ApiReturn::wrongParams('注册失败');
                }
                return ApiReturn::success('注册成功');
            }
        }else{
            $this->redirect(['site/index']);
        }
    }

    // 忘记密码
    public function actionForgot(){
        $params = Yii::$app->request->post();
        if(Yii::$app->request->isPost && isset($params['account'])){
            $account = $params['account'];
            $captcha = new CaptchaValidator();
            $captcha->captchaAction = 'site/forgotcaptcha';
            $res = $captcha->validate($params['captchaForgot']);
            //echo "res: $res";
            $errors = array();
            if($res == false){ // 验证码
                $errors[] = '图像验证码错误';
            }
            $redis = Yii::$app->redis;
            if(!$redis->get($params['account'].'-autocaptcha-forgot')){
                $errors[] = '动态验证码不能为空';
            }else{
                if($redis->get($params['account'].'-autocaptcha-forgot') != $params['autoCaptcha']){
                    $errors[] = '动态验证码错误';
                }
            }
            if($errors){
                return ApiReturn::wrongParams(join('<br/>', $errors));
            }else{ // 查找账号
                $customer = new Customer();
                $res = $customer::find()->where(['or', 'email="'.$account.'"', 'phone="'.$account.'"'])->one();
                if($res){
                    $model = Customer::findOne($res->customer_id);
                    $model->setPassword($params['password']);
                    if($model->save()){
                        return ApiReturn::success('修改成功');
                    }else{
                        return ApiReturn::wrongParams('修改失败');
                    }
                }else{
                    return ApiReturn::wrongParams('账号不存在');
                }
            }
        }else{
            $this->redirect(['site/index']);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        //Yii::$app->user->logout();
        //return $this->goHome();
        //Yii::$app->getSession()->destroy();
        $session = Yii::$app->session;
        //if ($session->isActive){
            Yii::$app->session->removeAll();
            Yii::$app->session->close();
            Yii::$app->session->destroy();
        //}
        $this->redirect(['site/index']);
    }

}
