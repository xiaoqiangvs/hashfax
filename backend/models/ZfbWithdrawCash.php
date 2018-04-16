<?php

namespace backend\models;

use common\models\gii\ZfbWithdrawCashGii;
use Yii;
use yii\base\Exception;

class ZfbWithdrawCash extends ZfbWithdrawCashGii
{
    /**
     * 关联客户
     * @return \yii\db\ActiveQuery
     */
    public function getCust(){
        return $this->hasOne(ZfbCust::className(), ['cust_id' => 'cust_id']);
    }

}
