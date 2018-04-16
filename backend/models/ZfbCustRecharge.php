<?php

namespace backend\models;

use common\models\gii\ZfbCustRechargeGii;
use Yii;
use yii\base\Exception;

class ZfbCustRecharge extends ZfbCustRechargeGii
{

    /**
     * 关联客户
     * @return \yii\db\ActiveQuery
     */
    public function getCust(){
        return $this->hasOne(ZfbCust::className(), ['cust_id' => 'cust_id']);
    }

}
