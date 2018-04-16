<?php

namespace frontend\models;

use backend\models\Customer;
use backend\models\ZfbCust;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegForm extends Model
{
    public $account;
    public $password;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['account', 'password'], 'required'],
            // email has to be a valid email address
            [['account'], 'verifyAccount'],
            // verifyCode needs to be entered correctly
            ['captchaReg', 'site/regcaptcha']
            /*['account', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * 自定义验证账号
     */
    public function verifyAccount($attribute, $params)
    {
        $email_pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        $phone_pattern = "/^1[34578]{1}\d{9}$/";
        if(!(preg_match($email_pattern, $this->account) || preg_match($phone_pattern, $this->account))){
            $this->addError($attribute, '手机或邮箱格式错误');
        }
    }

    public function reg(){
        if (!$this->validate()) {
            return null;
        }
        echo '++++++++++++++============';
        die;
        $cust = new Customer();
        $email_pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        $phone_pattern = "/^1[34578]{1}\d{9}$/";
        if(preg_match($email_pattern, $this->account)){
            $cust->email = $this->account;
        }
        if(preg_match($phone_pattern, $this->account)){
            $cust->phone = $this->account;
        }
        $cust->setPassword($this->password);
        $customer_id = Yii::$app->db->getLastInsertID();
        if(!$cust->save()){
            return null;
        }

        $zfbCust = new ZfbCust();
        $zfbCust->customer_id = $customer_id;
        $zfbCust->cust_email = $cust->email;
        $zfbCust->cust_phone = $cust->phone;
        return $zfbCust->save() ? $zfbCust : null;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
