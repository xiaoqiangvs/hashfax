<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $customer_id
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $salt
 * @property string $type 1表示平台，2表示电商;(1,2表示平台，电商都可以）
 * @property int $status
 * @property string $ctime
 * @property string $utime
 */
class CustomerGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'type', 'ctime', 'utime'], 'required'],
            [['status'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 100],
            [['salt'], 'string', 'max' => 30],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'salt' => 'Salt',
            'type' => '1表示平台，2表示电商;(1,2表示平台，电商都可以）',
            'status' => 'Status',
            'ctime' => 'Ctime',
            'utime' => 'Utime',
        ];
    }
}
