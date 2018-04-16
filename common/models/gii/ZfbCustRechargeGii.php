<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_recharge".
 *
 * @property string $recharge_id 充值记录ID
 * @property int $cust_id 客户ID
 * @property int $recharge_money 充值金额
 * @property string $desp 充值描述
 * @property string $ctime 添加时间
 */
class ZfbCustRechargeGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_cust_recharge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id', 'recharge_money'], 'integer'],
            [['ctime'], 'safe'],
            [['desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recharge_id' => '充值记录ID',
            'cust_id' => '客户ID',
            'recharge_money' => '充值金额',
            'desp' => '充值描述',
            'ctime' => '添加时间',
        ];
    }
}
