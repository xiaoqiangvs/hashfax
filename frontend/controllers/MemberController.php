<?php
namespace frontend\controllers;

use backend\models\Customer;
use backend\models\ZfbCoin;
use backend\models\ZfbCust;
use backend\models\ZfbCustAccount;
use backend\models\ZfbCustBank;
use backend\models\ZfbCustFinance;
use backend\models\ZfbCustFinanceLog;
use backend\models\ZfbCustLog;
use backend\models\ZfbGoods;
use backend\models\ZfbNav;
use backend\models\ZfbPage;
use backend\models\ZfbSystem;
use backend\models\ZfbCustOrders;
use common\helps\Tools;
use common\models\ApiReturn;
use dosamigos\qrcode\QrCode;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class MemberController extends AuthController
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
            //验证码action
            'captcha' => [
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
        $view->params['memNav'] = ZfbNav::find()->where(['nav_ctrl' => 'member'])->asArray()->orderBy('sort asc')->all();

        $model = ZfbPage::findOne(3);
        $view->params['protocol'] = $model->getAttribute('page_content');

        // 算力销售
        $view->params['goods_list'] = ZfbGoods::find()->where(['status' => 0, 'is_del' => 0, 'flag' => 0])->asArray()->all();

        // 网站配置
        $res = ZfbSystem::find()->asArray()->all();
        foreach($res as $key =>$val){
            $view->params[$val['sys_var']] = $val['sys_value'];
        }

        return parent::beforeAction($action);
    }

    /**
     * 二维码
     */
    public function actionQrcode($caddr = '')
    {
        return QrCode::png($caddr, false, 3, 6);
    }

    // 安全中心
    public function actionIndex($s = 0)
    {
        $recordTotal = ZfbCustLog::find()->count();
        $logList = ZfbCustLog::find()->limit(10)->offset($s)->orderBy('ctime desc')->asArray()->all();
        $data['s'] = $s;
        $data['recordTotal'] = $recordTotal;
        $data['logList'] = $logList;
        return $this->render('index', $data);
    }

    // 修改密码
    public function actionModpasswd(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $account = Yii::$app->session->get('cust')['cust'];

            $customer = new Customer();
            $res = $customer::find()->where(['or', 'email="'.$account.'"', 'phone="'.$account.'"'])->one();
            if($res){
                $model = Customer::findOne($res->customer_id);
                if($model->validatePassword($param['opassword'], $model->password)){
                    $model->setPassword($param['password']);
                    if($model->save()){
                        return ApiReturn::success('修改成功');
                    }else{
                        return ApiReturn::wrongParams('修改失败');
                    }
                }else{
                    return ApiReturn::wrongParams('旧密码错误');
                }
            }else{
                return ApiReturn::wrongParams('账号不存在');
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 设置/修改安全密码
    public function actionModspasswd(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $model = ZfbCust::findOne($cust_id);
            if(isset($param['opassword'])){
                if($model->validatePassword($param['opassword'], $model->security_passwd)){
                    $model->setPassword($param['password']);
                    if($model->save()){
                        $sess_cust = Yii::$app->session->get('cust');
                        $sess_cust['cust_has_spwd'] = 1;
                        Yii::$app->session->set('cust', $sess_cust);
                        return ApiReturn::success('修改成功');
                    }else{
                        return ApiReturn::wrongParams('修改失败');
                    }
                }else{
                    return ApiReturn::wrongParams('旧密码错误');
                }
            }else{
                $model->setPassword($param['password']);
                if($model->save()){
                    $sess_cust = Yii::$app->session->get('cust');
                    $sess_cust['cust_has_spwd'] = 1;
                    Yii::$app->session->set('cust', $sess_cust);
                    return ApiReturn::success('修改成功');
                }else{
                    return ApiReturn::wrongParams('修改失败');
                }
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 找回安全密码
    public function actionRespasswd(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $model = ZfbCust::findOne($cust_id);
            if(isset($param['opassword'])){
                if($model->validatePassword($param['opassword'], $model->security_passwd)){
                    $model->setPassword($param['password']);
                    if($model->save()){
                        $sess_cust = Yii::$app->session->get('cust');
                        $sess_cust['cust_has_spwd'] = 1;
                        Yii::$app->session->set('cust', $sess_cust);
                        return ApiReturn::success('修改成功');
                    }else{
                        return ApiReturn::wrongParams('修改失败');
                    }
                }else{
                    return ApiReturn::wrongParams('旧密码错误');
                }
            }else{
                $model->setPassword($param['password']);
                if($model->save()){
                    $sess_cust = Yii::$app->session->get('cust');
                    $sess_cust['cust_has_spwd'] = 1;
                    Yii::$app->session->set('cust', $sess_cust);
                    return ApiReturn::success('修改成功');
                }else{
                    return ApiReturn::wrongParams('修改失败');
                }
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 绑定手机
    public function actionBindphone(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $model = ZfbCust::findOne($cust_id);

            $cust = Yii::$app->session->get('cust')['cust'];
            $cust_phone = Yii::$app->session->get('cust')['cust_phone'];
            $post_phone = $param['cust_phone'];
            if($cust != $cust_phone){
                $errors = [];
                if(!Tools::checkPhone($post_phone)){
                    $errors[] = '手机号码格式错误';
                }

                $redis = Yii::$app->redis;
                //验证手机验证码
                if(!$redis->get($cust.'-autocaptcha-phone')){
                    $errors[] = '手机动态验证码不能为空';
                }else{
                    if($redis->get($cust.'-autocaptcha-phone') != $param['phoneCaptcha']){
                        $errors[] = '手机动态验证码错误';
                    }
                }

                //验证邮箱验证码
                if(!$redis->get($cust.'-autocaptcha-pemail')){
                    $errors[] = '动态验证码不能为空';
                }else{
                    if($redis->get($cust.'-autocaptcha-pemail') != $param['emailCaptcha']){
                        $errors[] = '动态验证码错误';
                    }
                }

                if(!$model->validatePassword($param['security_password'], $model->security_passwd)){
                    $errors[] = '安全密码错误';
                }

                if($errors) {
                    return ApiReturn::wrongParams(join("\n", $errors));
                }

                $model->cust_phone = $post_phone;
                if($model->save()){
                    $sess_cust = Yii::$app->session->get('cust');
                    $sess_cust['cust_phone'] = $post_phone;
                    $sess_cust['cust_has_phone'] = 1;
                    Yii::$app->session->set('cust', $sess_cust);
                    return ApiReturn::success('修改成功');
                }else{
                    return ApiReturn::wrongParams('修改失败');
                }
            }else{
                return ApiReturn::wrongParams('手机号码和账号存在联系，不能修改');
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 绑定邮箱
    public function actionBindemail(){
        if(Yii::$app->request->isPost){
            $param = Yii::$app->request->post();
            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $model = ZfbCust::findOne($cust_id);

            $cust = Yii::$app->session->get('cust')['cust'];
            $cust_email = Yii::$app->session->get('cust')['cust_email'];
            $post_email = $param['cust_email'];
            if($cust != $cust_email){
                $errors = [];
                if(!Tools::checkEmail($post_email)){
                    $errors[] = '电子邮箱格式错误';
                }

                $redis = Yii::$app->redis;
                //验证邮箱验证码
                if(!$redis->get($cust.'-autocaptcha-email')){
                    $errors[] = '动态验证码不能为空';
                }else{
                    if($redis->get($cust.'-autocaptcha-email') != $param['autoCaptcha']){
                        $errors[] = '动态验证码错误';
                    }
                }

                if(!$model->validatePassword($param['security_password'], $model->security_passwd)){
                    $errors[] = '安全密码错误';
                }

                if($errors) {
                    return ApiReturn::wrongParams(join("\n", $errors));
                }

                $model->cust_email = $post_email;
                if($model->save()){
                    $sess_cust = Yii::$app->session->get('cust');
                    $sess_cust['cust_email'] = $post_email;
                    $sess_cust['cust_has_email'] = 1;
                    Yii::$app->session->set('cust', $sess_cust);
                    return ApiReturn::success('修改成功');
                }else{
                    return ApiReturn::wrongParams('修改失败');
                }
            }else{
                return ApiReturn::wrongParams('电子邮箱和账号存在联系，不能修改');
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 财务中心
    public function actionFinance(){
        $coinArr = array('CNY' => '￥', 'USDT' => 'U', 'BTC' => '฿' , 'LTC' => 'Ł', 'ETH' => 'E', 'ETC' => 'EC');
        $data['coinArr'] = $coinArr;

        $coinList = ZfbCoin::find()->orderBy('sort asc')->asArray()->all();
        $data['coinList'] = $coinList;

        $financeList = ZfbCustFinance::find()->where(['cust_id' => 1])->asArray()->all();
        $list = array();
        if($financeList){
            foreach($financeList as $val){
                $list[$val['coin_id']] = $val;
            }
        }
        $data['financeList'] = $list;
        return $this->render('finance', $data);
    }

    // 充值业务
    public function actionRecharge($s = 0, $c = 2){
        $coinList = ZfbCoin::find()->orderBy('sort asc')->asArray()->all();
        $data['coinList'] = $coinList;

        $cond = array('coin_id' => $c, 'flag' => 0, 'cust_id' => Yii::$app->session->get('cust_id'));
        $recordTotal = ZfbCustFinanceLog::find()->where($cond)->count();
        $logList = ZfbCustFinanceLog::find()->where($cond)->limit(10)->offset($s)->orderBy('ctime desc')->asArray()->all();
        $data['s'] = $s;
        $data['c'] = $c;
        $data['recordTotal'] = $recordTotal;
        $data['logList'] = $logList;
        return $this->render('recharge', $data);
    }

    // 提现业务
    public function actionWithdrawcash($s = 0, $c = 1){
        $cust_id = Yii::$app->session->get('cust')['cust_id'];
        $coinList = ZfbCoin::find()->orderBy('sort asc')->asArray()->all();
        $data['coinList'] = $coinList;

        $addrList = array();
        //获取地址列表
        if($c != '1'){
            //虚拟账号列表
            $list = ZfbCustAccount::find()->where(['cust_id'=>$cust_id, 'coin_id' => $c])->asArray()->all();
            foreach($list as $val) {
                $addrList[$val['account_id']] = $val['account'];
            }
        }else{
            //银行账号
            $list = ZfbCustBank::find()->where(['cust_id' => $cust_id])->asArray()->all();
            foreach($list as $val){
                $addrList[$val['bank_id']] = $val['bank_no'];
            }
        }
        $data['addrList'] = $addrList;

        //可用余额
        $coinBList = ZfbCustFinance::find()->where(['cust_id' => $cust_id, 'coin_id' => $c])->asArray()->one();
        $data['coinBList'] = $coinBList;

        $cond = array('coin_id' => $c, 'flag' => 1, 'cust_id' => $cust_id);
        $recordTotal = ZfbCustFinanceLog::find()->where($cond)->count();
        $logList = ZfbCustFinanceLog::find()->where($cond)->limit(10)->offset($s)->orderBy('ctime desc')->asArray()->all();
        $data['s'] = $s;
        $data['c'] = $c;
        $data['recordTotal'] = $recordTotal;
        $data['logList'] = $logList;
        return $this->render('withdrawcash', $data);
    }

    // 申请提现
    public function actionAddmount(){
        if(Yii::$app->request->isPost) {
            $param = Yii::$app->request->post();
            $balance = $param['balance'];

            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $cust = Yii::$app->session->get('cust')['cust'];
            $model = ZfbCust::findOne($cust_id);
            $errors = [];
            if(!$balance){
                $errors[] = '没有可用余额';
            }elseif($balance < $param['amount']){
                $errors[] = '提取额度大于可用余额';
            }
            if(!$model->validatePassword($param['security_password'], $model->security_passwd)){
                $errors[] = '安全密码错误';
            }

            $redis = Yii::$app->redis;
            //验证动态验证码
            if(!$redis->get($cust.'-autocaptcha-wdcEmail')){
                $errors[] = '动态验证码不能为空';
            }else{
                if($redis->get($cust.'-autocaptcha-wdcEmail') != $param['autoCaptcha']){
                    $errors[] = '动态验证码错误';
                }
            }

            if($errors) {
                return ApiReturn::wrongParams(join("\n", $errors));
            }

            $coin_id = $param['coin_id'];
            $model = new ZfbCustFinanceLog();
            $model->account_id = $param['account_id'];
            $model->coin_id = $coin_id;
            $model->cust_id = $cust_id;
            $model->amount = $param['amount'];
            $model->flag = 1;
            $model->status = 0;
            $model->ctime = date('Y-m-d H:i:s');
            $model->utime = date('Y-m-d H:i:s');
            if($model->save()){
                return ApiReturn::success('保存成功');
            }else{
                $errors = $model->getErrors();
                var_dump($errors);
                return ApiReturn::wrongParams('保存失败');
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 资金账号
    public function actionAccount(){
        $coinList = ZfbCoin::find()->orderBy('sort asc')->asArray()->all();
        $data['coinList'] = $coinList;

        $cust_id = Yii::$app->session->get('cust')['cust_id'];
        $accountList = ZfbCustAccount::find()->where(['cust_id' => $cust_id])->asArray()->all();
        $list = array();
        if($accountList){
            foreach($accountList as $val){
                if(array_key_exists($val['coin_id'], $list)){
                    $list[$val['coin_id']][] = $val;
                }else{
                    $list[$val['coin_id']][] = $val;
                }
            }
        }
        $bankList = ZfbCustBank::find()->where(['cust_id' => $cust_id])->asArray()->all();
        $data['accountList'] = $list;
        $data['bankList'] = $bankList;
        return $this->render('account', $data);
    }

    // 更新资金账号
    public function actionUpdateaccount(){
        if(Yii::$app->request->isPost) {
            $param = Yii::$app->request->post();
            $account_id = $param['account_id'];
            $coin_id = $param['coin_id'];

            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            $cust = Yii::$app->session->get('cust')['cust'];
            $model = ZfbCust::findOne($cust_id);
            if(!$model->validatePassword($param['security_password'], $model->security_passwd)){
                return ApiReturn::wrongParams('安全密码错误');
            }
            if($coin_id != '1'){  //非银行账号
                $redis = Yii::$app->redis;
                //验证动态验证码
                if(!$redis->get($cust.'-autocaptcha-acEmail')){
                    return ApiReturn::wrongParams('动态验证码不能为空');
                }else{
                    if($redis->get($cust.'-autocaptcha-acEmail') != $param['autoCaptcha']){
                        return ApiReturn::wrongParams('动态验证码错误');
                    }
                }

                $model = $account_id ? ZfbCustAccount::findOne($account_id) : new ZfbCustAccount();
                $model->account = $param['account'];
                $model->account_desp = $param['account_desp'];
                if(!$account_id){
                    $model->cust_id = $cust_id;
                    $model->coin_id = $coin_id;
                    $model->ctime = date('Y-m-d H:i:s');
                    $model->status = 0;
                }
                $model->utime = date('Y-m-d H:i:s');
            }else{
                $model = $account_id ? ZfbCustBank::findOne($account_id) : new ZfbCustBank();
                $model->bank_account = $param['bank_account'];
                $model->bank_name = $param['bank_name'];
                $model->bank_pro_city = $param['bank_pro_city'];
                $model->bank_child = $param['bank_child'];
                $model->bank_no = $param['bank_no'];
                if(!$account_id){
                    $model->cust_id = $cust_id;
                    $model->ctime = date('Y-m-d H:i:s');
                    $model->status = 0;
                }
                $model->utime = date('Y-m-d H:i:s');
            }
            // 搜索财务中心
            $res = ZfbCustFinance::find()->where(['cust_id' => $cust_id, 'coin_id' => $coin_id])->asArray()->one();
            if(!$res){
                $zfbCustF = new ZfbCustFinance();
                $zfbCustF->cust_id = $cust_id;
                $zfbCustF->coin_id = $coin_id;
                $zfbCustF->balance = 0;
                $zfbCustF->frozen = 0;
                $zfbCustF->ctime = date('Y-m-d H:i:s');
                $zfbCustF->utime = date('Y-m-d H:i:s');
                $zfbCustF->save();
                //$errors = $zfbCustF->getErrors();
            }

            if($model->save()){
                return ApiReturn::success('保存成功');
            }else{
                return ApiReturn::wrongParams('保存失败');
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    //设置资金默认账号
    public function actionUpdatestatus(){
        if(Yii::$app->request->isPost) {
            $param = Yii::$app->request->post();
            $account_id = $param['account_id'];
            $coin_id = $param['coin_id'];

            $cust_id = Yii::$app->session->get('cust')['cust_id'];
            if($param['coin_id'] != '1'){
                ZfbCustAccount::updateAll(['status' => 0], ['cust_id' => $cust_id , 'coin_id' => $coin_id]);
                $model = ZfbCustAccount::findOne($account_id);
                $model->status = 1;
                if($model->save()){
                    return ApiReturn::success('设置成功');
                }else{
                    return ApiReturn::wrongParams('设置失败');
                }
            }else{
                ZfbCustBank::updateAll(['status' => 0], ['cust_id' => $cust_id]);
                $model = ZfbCustBank::findOne($account_id);
                $model->status = 1;
                if($model->save()){
                    return ApiReturn::success('设置成功');
                }else{
                    return ApiReturn::wrongParams('设置失败');
                }
            }
        }else{// 不是post传递的参数直接跳转到首页
            $this->redirect(['member/index']);
        }
    }

    // 综合账单
    public function actionFinancelog($s = 0, $f = null){
        $coinList = ZfbCoin::find()->orderBy('sort asc')->asArray()->all();
        $coinArr = array();
        if($coinList){
            foreach($coinList as $val){
                $coinArr[$val['coin_id']] = $val['coin_type'];
            }
        }
        $data['coinArr'] = $coinArr;

        $cond = $f != null ? ['flag' => $f] : array();
        $recordTotal = ZfbCustFinanceLog::find()->where($cond)->count();
        $logList = ZfbCustFinanceLog::find()->where($cond)->limit(10)->offset($s)->orderBy('ctime desc')->asArray()->all();
        $data['s'] = $s;
        $data['f'] = $f;
        $data['recordTotal'] = $recordTotal;
        $data['logList'] = $logList;
        return $this->render('financelog', $data);
    }

    // 优惠券
    public function actionCoupon(){

    }

    //购买记录
    public function actionBuylog($s = 0, $f = 10){
        $cust_id = Yii::$app->session->get('cust')['cust_id']; //登录人id
        $goods = ZfbGoods::find()->asArray()->all();//商品
        $goodlist = array();
        if($goods){
            foreach($goods as $val){
                $goodlist[$val['good_id']] = $val['good_title'];
            }
        }
        print_r($goodlist);
        $data['goodlist'] = $goodlist;
        $recordTotal = ZfbCustOrders::find()->where('cust_id='.$cust_id)->count(); //购买总数
        $buglog = ZfbCustOrders::find()->where('cust_id='.$cust_id)->limit($f)->offset($s)->orderBy('ctime asc')->asArray()->all();//购买商品列表
        $data['s'] = $s;
        $data['f'] = $f;
        $data['recordTotal'] = $recordTotal;
        $data['buylog'] = $buglog;
        return $this->render('buglog',$data);
    }

    //当前状态收益
    public function actionProfit(){
        $lang = Yii::$app->session->get('language');
        if($lang == 'zh-cn'){
            $bprice = 50477.06; //人民币价
        }
        if($lang == 'en'){
            $bprice = 8035.96;//美元
        }
        $dprice = '0.00006746';//动态收益
        $cust_id = Yii::$app->session->get('cust')['cust_id']; //登录人id
        $goods = ZfbGoods::find()->asArray()->all();//商品
        $goodlist = array();
        $zuli_days = array();
        $huiben_days = array();
        $sign_calc = array();
        $goodtotal = array();
        if($goods){
            foreach($goods as $val){
                $goodlist[$val['good_id']] = $val['good_title']; //商品名
                $zuli_days[$val['good_id']] = $val['zuli_days'];// 天数
                $huiben_days[$val['good_id']] = $val['huiben_days'];// 回本天数
                $sign_calc[$val['good_id']] = $val['sign_calc'];//算力
                $fuwufei[$val['good_id']] = $val['ri_weihu']; //服务费
                $dianfei[$val['good_id']] = $val['dianfei']; //电费单价
                $gonghao[$val['good_id']] = $val['gonghao'];//功耗
            }
        }
        $data['goodlist'] = $goodlist;
        $data['zulidays'] = $zuli_days;
        $data['huibendays'] = $huiben_days;
        $recordTotal = ZfbCustOrders::find()->where('cust_id='.$cust_id)->count(); //购买总数
        $buglog = ZfbCustOrders::find()->where('cust_id='.$cust_id)->orderBy('ctime asc')->asArray()->all();//购买商品列表
        foreach ($buglog as $val){
            $suanlitotal = $val['good_quantity']*$sign_calc[$val['good_id']]; //算力总量=购买数量*算力
            $sytotal = $suanlitotal*$dprice; //用户持有算力产生的收益 =算力总量*24小时理论收益
            $cctotal = $fuwufei[$val['good_id']]/100*$sytotal;//平台抽成 =用户持有收益*服务费
            $dftotal = $dianfei[$val['good_id']]*$gonghao[$val['good_id']]*$suanlitotal*24/1000/$bprice; //电费=电费单价*功耗*算力总量*24/1000/币价
            $profit = $sytotal-$cctotal-$dftotal; //每天收益预估 = 用户持有算力收益-平台抽成-电费
            $profitdays[$val['order_id']] = $profit;// 比特币
            if($lang == 'zh-cn'){
                $price[$val['order_id']] = '￥'.number_format($profit*$bprice,2); //换算人民币
            }else{
                $price[$val['order_id']] = '$'.number_format($profit*$bprice,2); //换算美元
            }
        }
        $data['profit']= $profitdays;
        $data['price'] = $price;
        $data['dprice'] = $dprice;
        $data['recordTotal'] = $recordTotal;
        $data['buylog'] = $buglog;
        return $this->render('profit',$data);
    }
}
