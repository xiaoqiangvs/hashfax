<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_goods".
 *
 * @property string $good_id 商品ID
 * @property string $good_title 商品标题
 * @property string $good_price 租赁价格
 * @property string $sign_calc 单位算力
 * @property string $store 库存
 * @property string $eth_cny 实时ETH/CNY
 * @property string $opentime 开放租赁时间
 * @property double $zuli_days 算力租赁天数
 * @property double $huiben_days 回本周期
 * @property double $ri_weihu 日维护费
 * @property double $dianfei 电费
 * @property double $gonghao 功耗
 * @property int $status 状态，0可购，1已满
 * @property int $flag 0表示上架，1表示下架
 * @property int $synchro 1表示同步到电商，0表示不同步
 * @property int $prod_id 产品ID
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbGoodsGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_price', 'zuli_days', 'huiben_days', 'ri_weihu', 'dianfei', 'gonghao'], 'number'],
            [['opentime', 'ctime', 'utime'], 'safe'],
            [['status', 'flag', 'synchro', 'prod_id', 'cid', 'uid', 'is_del'], 'integer'],
            [['good_title', 'sign_calc', 'store', 'eth_cny'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'good_id' => '商品ID',
            'good_title' => '商品标题',
            'good_price' => '租赁价格',
            'sign_calc' => '单位算力',
            'store' => '库存',
            'eth_cny' => '实时ETH/CNY',
            'opentime' => '开放租赁时间',
            'zuli_days' => '算力租赁天数',
            'huiben_days' => '回本周期',
            'ri_weihu' => '日维护费',
            'dianfei' => '电费',
            'gonghao' => '功耗',
            'status' => '状态，0可购，1已满',
            'flag' => '0表示上架，1表示下架',
            'synchro' => '1表示同步到电商，0表示不同步',
            'prod_id' => '产品ID',
            'cid' => '添加人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
