<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_finance_log".
 *
 * @property string $log_id 日志ID
 * @property int $cust_id 客户ID
 * @property int $account_id 账号ID
 * @property int $coin_id 币种ID
 * @property int $flag 0表示充值，1表示提现
 * @property double $amount 金额
 * @property int $status 提现时使用，0表示还未提现，1表示已提现
 * @property string $desp 描述
 * @property int $cid 创建人
 * @property int $uid 提现时使用，管理员ID
 * @property string $ctime
 * @property string $utime
 */
class ZfbCustFinanceLogGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_cust_finance_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cust_id', 'account_id', 'coin_id', 'flag', 'status', 'cid', 'uid'], 'integer'],
            [['amount'], 'number'],
            [['ctime', 'utime'], 'safe'],
            [['desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => '日志ID',
            'cust_id' => '客户ID',
            'account_id' => '账号ID',
            'coin_id' => '币种ID',
            'flag' => '0表示充值，1表示提现',
            'amount' => '金额',
            'status' => '提现时使用，0表示还未提现，1表示已提现',
            'desp' => '描述',
            'cid' => '创建人',
            'uid' => '提现时使用，管理员ID',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }
}
