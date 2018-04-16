<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust_log".
 *
 * @property string $log_id 日志ID
 * @property int $cust_id 客户ID
 * @property string $type 类别
 * @property string $dec_type 设备类型
 * @property string $ip IP地址说明
 * @property string $desp 描述
 * @property string $ctime 添加时间
 */
class ZfbCustLogGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_cust_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id'], 'integer'],
            [['ctime'], 'safe'],
            [['type'], 'string', 'max' => 30],
            [['dec_type', 'desp'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => '日志ID',
            'cust_id' => '客户ID',
            'type' => '类别',
            'dec_type' => '设备类型',
            'ip' => 'IP地址说明',
            'desp' => '描述',
            'ctime' => '添加时间',
        ];
    }
}
