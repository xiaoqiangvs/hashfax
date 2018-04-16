<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_bank".
 *
 * @property string $bank_id 银行卡ID
 * @property string $bank_account 开户名
 * @property string $bank_name 开户银行
 * @property string $bank_pro_city 开户银行省/市
 * @property string $bank_child 开户支行名称
 * @property string $bank_no 银行卡号
 * @property int $cust_id
 * @property int $status 0表示不默认，1表示默认
 * @property string $ctime
 * @property string $utime
 */
class ZfbCustBankGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_cust_bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cust_id', 'status'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['bank_account', 'bank_name', 'bank_pro_city'], 'string', 'max' => 50],
            [['bank_child'], 'string', 'max' => 255],
            [['bank_no'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_id' => '银行卡ID',
            'bank_account' => '开户名',
            'bank_name' => '开户银行',
            'bank_pro_city' => '开户银行省/市',
            'bank_child' => '开户支行名称',
            'bank_no' => '银行卡号',
            'cust_id' => 'Cust ID',
            'status' => '0表示不默认，1表示默认',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }
}
