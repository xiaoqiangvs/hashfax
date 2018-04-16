<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_file".
 *
 * @property string $file_id 文件ID
 * @property string $file_path 文件地址
 * @property int $status 状态
 * @property string $type 类型 news/page/notice
 * @property int $type_id 类型ID
 * @property string $ctime 添加时间
 */
class ZfbFileGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'type_id'], 'integer'],
            [['ctime'], 'safe'],
            [['file_path'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => '文件ID',
            'file_path' => '文件地址',
            'status' => '状态',
            'type' => '类型 news/page/notice',
            'type_id' => '类型ID',
            'ctime' => '添加时间',
        ];
    }
}
