<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_prod".
 *
 * @property string $prod_id 产品ID
 * @property string $prod_name 产品名称
 * @property string $prod_photo 产品描述
 * @property string $desp 产品详情
 * @property string $suanli 算力
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbProdGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_prod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['prod_name', 'prod_photo'], 'string', 'max' => 50],
            [['desp'], 'string', 'max' => 255],
            [['suanli'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prod_id' => '产品ID',
            'prod_name' => '产品名称',
            'prod_photo' => '产品描述',
            'desp' => '产品详情',
            'suanli' => '算力',
            'cid' => '添加人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
