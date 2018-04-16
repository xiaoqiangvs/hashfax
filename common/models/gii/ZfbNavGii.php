<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_nav".
 *
 * @property string $nav_id 导航ID
 * @property string $nav_name 导航名
 * @property string $nav_name_en 英文标题
 * @property string $nav_ctrl 关联模块
 * @property string $nav_url 链接地址
 * @property string $rel_nav_id 关联导航ID
 * @property int $nav_level 0表示顶级，1表示子页
 * @property int $display_sub 0表示显示子导航，1表示不显示
 * @property int $display 0表示显示，1表示不显示
 * @property int $sort 排序
 * @property int $cid
 * @property int $uid
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbNavGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_nav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nav_level', 'display_sub', 'display', 'sort', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['nav_name'], 'string', 'max' => 20],
            [['nav_name_en', 'nav_ctrl', 'rel_nav_id'], 'string', 'max' => 50],
            [['nav_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nav_id' => '导航ID',
            'nav_name' => '导航名',
            'nav_name_en' => '英文标题',
            'nav_ctrl' => '关联模块',
            'nav_url' => '链接地址',
            'rel_nav_id' => '关联导航ID',
            'nav_level' => '0表示顶级，1表示子页',
            'display_sub' => '0表示显示子导航，1表示不显示',
            'display' => '0表示显示，1表示不显示',
            'sort' => '排序',
            'cid' => 'Cid',
            'uid' => 'Uid',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
