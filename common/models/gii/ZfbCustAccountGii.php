<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_account".
 *
 * @property string $account_id 账号ID
 * @property string $account 账号
 * @property int $coin_id 币种ID
 * @property string $account_desp 账号描述
 * @property int $cust_id 客户ID
 * @property int $status 0表示不默认，1表示默认
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 */
class ZfbCustAccountGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_cust_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coin_id', 'cust_id', 'status'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['account', 'account_desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'account_id' => '账号ID',
            'account' => '账号',
            'coin_id' => '币种ID',
            'account_desp' => '账号描述',
            'cust_id' => '客户ID',
            'status' => '0表示不默认，1表示默认',
            'ctime' => '添加时间',
            'utime' => '修改时间',
        ];
    }
}
