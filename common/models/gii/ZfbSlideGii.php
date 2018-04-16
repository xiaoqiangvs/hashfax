<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_slide".
 *
 * @property string $slide_id 幻灯片图片ID
 * @property string $photo_path 图片地址
 * @property string $slide_btn 链接按钮说明，默认查看详情
 * @property string $slide_desp 幻灯片描述
 * @property string $slide_url 幻灯片链接
 * @property int $display 是否显示
 * @property int $nav_id 导航ID
 * @property int $cid 创建人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 */
class ZfbSlideGii extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display', 'nav_id', 'cid', 'uid'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['photo_path', 'slide_btn', 'slide_url'], 'string', 'max' => 50],
            [['slide_desp'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slide_id' => '幻灯片图片ID',
            'photo_path' => '图片地址',
            'slide_btn' => '链接按钮说明，默认查看详情',
            'slide_desp' => '幻灯片描述',
            'slide_url' => '幻灯片链接',
            'display' => '是否显示',
            'nav_id' => '导航ID',
            'cid' => '创建人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
        ];
    }
}
