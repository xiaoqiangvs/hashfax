<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_notice".
 *
 * @property string $notice_id 公告ID
 * @property string $notice_title 公告标题
 * @property string $notice_author 发布人
 * @property string $notice_content 公告内容
 * @property string $notice_photo 公告图片
 * @property string $meta_keyword 关键词
 * @property string $meta_desp 描述
 * @property int $count 访问次数
 * @property string $lang 语言
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbNoticeGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_notice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notice_content'], 'string'],
            [['count', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['notice_title'], 'string', 'max' => 100],
            [['notice_author'], 'string', 'max' => 50],
            [['notice_photo', 'meta_keyword', 'meta_desp'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'notice_id' => '公告ID',
            'notice_title' => '公告标题',
            'notice_author' => '发布人',
            'notice_content' => '公告内容',
            'notice_photo' => '公告图片',
            'meta_keyword' => '关键词',
            'meta_desp' => '描述',
            'count' => '访问次数',
            'lang' => '语言',
            'cid' => '添加人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
