<?php

namespace backend\models;

use common\models\gii\ZfbCustOrdersGii;
use Yii;
use yii\base\Exception;

class ZfbCustOrders extends ZfbCustOrdersGii
{
    /**
     * 关联客户
     * @return \yii\db\ActiveQuery
     */
    public function getCust(){
        return $this->hasOne(ZfbCust::className(), ['cust_id' => 'cust_id']);
    }

    /**
     * 关联商品
     */
    public function getGood(){
        return $this->hasOne(ZfbGoods::className(), ['good_id' => 'good_id']);
    }
}
