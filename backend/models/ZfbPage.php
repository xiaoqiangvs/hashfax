<?php

namespace backend\models;

use common\models\gii\ZfbPageGii;
use Yii;
use yii\base\Exception;

class ZfbPage extends ZfbPageGii
{
    /**
     * 关联菜单
     */
    public function getNav(){
        return $this->hasOne(ZfbNav::className(), ['nav_id' => 'nav_id']);
    }
}
