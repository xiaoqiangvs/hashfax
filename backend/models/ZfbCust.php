<?php

namespace backend\models;

use common\models\gii\ZfbCustGii;
use Yii;
use yii\base\Exception;

class ZfbCust extends ZfbCustGii
{

    public function validatePassword($password, $hash)
    {
        return Yii::$app->security->validatePassword($password, $hash);
    }

    public function setPassword($password)
    {
        $this->security_passwd = Yii::$app->security->generatePasswordHash($password);
    }
}
