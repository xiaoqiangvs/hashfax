<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_page".
 *
 * @property string $page_id 页面ID 
 * @property string $page_title 页面标题
 * @property string $page_title_en 英文标题
 * @property string $page_author 发布人
 * @property string $page_content 页面内容
 * @property string $page_content_en 英文内容
 * @property int $nav_id 导航ID
 * @property string $meta_keyword 关键词
 * @property string $meta_keyword_en 英文关键词
 * @property string $meta_desp 描述
 * @property string $meta_desp_en 英文关键描述
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 创建时间
 * @property string $utime 修改时间ID
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbPageGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_content', 'page_content_en'], 'string'],
            [['nav_id', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['page_title', 'page_author'], 'string', 'max' => 50],
            [['page_title_en'], 'string', 'max' => 100],
            [['meta_keyword', 'meta_keyword_en', 'meta_desp', 'meta_desp_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'page_id' => '页面ID ',
            'page_title' => '页面标题',
            'page_title_en' => '英文标题',
            'page_author' => '发布人',
            'page_content' => '页面内容',
            'page_content_en' => '英文内容',
            'nav_id' => '导航ID',
            'meta_keyword' => '关键词',
            'meta_keyword_en' => '英文关键词',
            'meta_desp' => '描述',
            'meta_desp_en' => '英文关键描述',
            'cid' => '添加人ID',
            'uid' => '修改人ID',
            'ctime' => '创建时间',
            'utime' => '修改时间ID',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
