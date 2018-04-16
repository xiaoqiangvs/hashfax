<?php

namespace backend\models;

use common\models\gii\ZfbCustAccountGii;
use Yii;
use yii\base\Exception;

class ZfbCustAccount extends ZfbCustAccountGii
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
     * @return \yii\db\ActiveQuery
     */
    public function getCoin(){
        return $this->hasOne(ZfbCoin::className(), ['coin_id' => 'coin_id']);
    }
}
