<?php

namespace backend\models;

use common\models\gii\ZfbAdminGii;
use Yii;
use yii\base\Exception;

class ZfbAdmin extends ZfbAdminGii
{
    public function validatePassword($password, $hash)
    {
        return Yii::$app->security->validatePassword($password, $hash);
    }

    public function setPassword($password)
    {
        $this->passwd = Yii::$app->security->generatePasswordHash($password);
    }
}
