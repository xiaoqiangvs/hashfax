<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_coin".
 *
 * @property string $coin_id 币种ID
 * @property string $coin_type 币种种类
 * @property string $coin_addr 币种地址
 * @property string $coin_url 链接地址
 * @property string $coin_desp 描述
 * @property int $sort 排序
 * @property int $cid 添加人
 * @property int $uid 修改人
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del
 */
class ZfbCoinGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_coin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['coin_type'], 'string', 'max' => 10],
            [['coin_addr', 'coin_url'], 'string', 'max' => 100],
            [['coin_desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coin_id' => '币种ID',
            'coin_type' => '币种种类',
            'coin_addr' => '币种地址',
            'coin_url' => '链接地址',
            'coin_desp' => '描述',
            'sort' => '排序',
            'cid' => '添加人',
            'uid' => '修改人',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => 'Is Del',
        ];
    }
}
