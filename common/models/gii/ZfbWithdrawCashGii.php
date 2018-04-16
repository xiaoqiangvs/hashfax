<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_withdraw_cash".
 *
 * @property string $withdraw_id 提现ID
 * @property int $cust_id 客户ID
 * @property string $withdraw_money 金额
 * @property string $ctime 添加时间
 * @property int $did 后台管理员ID
 * @property int $status 状态0表示待提现，1表示已打款
 * @property string $desp 描述
 * @property string $dtime 打款日期
 */
class ZfbWithdrawCashGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_withdraw_cash';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id', 'did', 'status'], 'integer'],
            [['ctime', 'dtime'], 'safe'],
            [['withdraw_money', 'desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'withdraw_id' => '提现ID',
            'cust_id' => '客户ID',
            'withdraw_money' => '金额',
            'ctime' => '添加时间',
            'did' => '后台管理员ID',
            'status' => '状态0表示待提现，1表示已打款',
            'desp' => '描述',
            'dtime' => '打款日期',
        ];
    }
}
