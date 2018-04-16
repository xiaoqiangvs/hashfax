<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_orders".
 *
 * @property string $order_id 订单ID
 * @property string $order_no 订单号
 * @property int $good_id 商品ID
 * @property int $good_quantity 商品数量
 * @property int $order_cash 购买金额
 * @property int $cust_id 客户ID
 * @property string $ctime 添加时间
 */
class ZfbCustOrdersGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_cust_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good_id', 'good_quantity', 'order_cash', 'cust_id'], 'integer'],
            [['ctime'], 'safe'],
            [['order_no'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => '订单ID',
            'order_no' => '订单号',
            'good_id' => '商品ID',
            'good_quantity' => '商品数量',
            'order_cash' => '购买金额',
            'cust_id' => '客户ID',
            'ctime' => '添加时间',
        ];
    }
}
