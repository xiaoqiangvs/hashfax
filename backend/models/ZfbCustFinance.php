<?php

namespace backend\models;

use common\models\gii\ZfbCustFinanceGii;
use Yii;
use yii\base\Exception;

class ZfbCustFinance extends ZfbCustFinanceGii
{

    /**
     * 关联客户
     * @return \yii\db\ActiveQuery
     */
    public function getCust(){
        return $this->hasOne(ZfbCust::className(), ['cust_id' => 'cust_id']);
    }

    /**
     * 关联币种
     */
    public function getCoin(){
        return $this->hasOne(ZfbCoin::className(), ['coin_id' => 'coin_id']);
    }

}
