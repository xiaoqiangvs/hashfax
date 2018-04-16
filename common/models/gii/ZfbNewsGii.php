<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_news".
 *
 * @property string $news_id 新闻ID
 * @property string $news_title 新闻标题
 * @property string $news_content 新闻内容
 * @property string $news_author 新闻作者
 * @property string $meta_keyword 关键词
 * @property string $meta_desp 关键描述
 * @property string $status 状态，0表示发布，1表示草稿，2表示回收站
 * @property int $count 访问次数
 * @property string $lang 语言
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbNewsGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_content'], 'string'],
            [['count', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['news_title', 'meta_keyword'], 'string', 'max' => 100],
            [['news_author'], 'string', 'max' => 50],
            [['meta_desp', 'status'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => '新闻ID',
            'news_title' => '新闻标题',
            'news_content' => '新闻内容',
            'news_author' => '新闻作者',
            'meta_keyword' => '关键词',
            'meta_desp' => '关键描述',
            'status' => '状态，0表示发布，1表示草稿，2表示回收站',
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
