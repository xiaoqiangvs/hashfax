<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_finance".
 *
 * @property string $finance_id 财务ID
 * @property int $coin_id 币种ID
 * @property int $cust_id 客户ID
 * @property double $balance 可用余额
 * @property double $frozen 冻结数量
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 */
class ZfbCustFinanceGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_cust_finance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coin_id', 'cust_id'], 'integer'],
            [['balance', 'frozen'], 'number'],
            [['ctime', 'utime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'finance_id' => '财务ID',
            'coin_id' => '币种ID',
            'cust_id' => '客户ID',
            'balance' => '可用余额',
            'frozen' => '冻结数量',
            'ctime' => '添加时间',
            'utime' => '修改时间',
        ];
    }
}
