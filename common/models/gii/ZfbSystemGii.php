<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_system".
 *
 * @property string $sys_var 变量名
 * @property string $sys_value 变量值
 * @property string $sys_desp 变量描述
 * @property int $display 0表示不显示，1显示
 */
class ZfbSystemGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sys_var'], 'required'],
            [['display'], 'integer'],
            [['sys_var'], 'string', 'max' => 20],
            [['sys_value'], 'string', 'max' => 255],
            [['sys_desp'], 'string', 'max' => 1000],
            [['sys_var'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sys_var' => '变量名',
            'sys_value' => '变量值',
            'sys_desp' => '变量描述',
            'display' => '0表示不显示，1显示',
        ];
    }
}
