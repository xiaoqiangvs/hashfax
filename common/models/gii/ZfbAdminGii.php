<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_admin".
 *
 * @property string $admin_id 管理员ID
 * @property string $account 账号
 * @property string $passwd 密码
 * @property string $ico_path 图片地址
 * @property int $cid 创建人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbAdminGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['account'], 'string', 'max' => 10],
            [['passwd'], 'string', 'max' => 100],
            [['ico_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => '管理员ID',
            'account' => '账号',
            'passwd' => '密码',
            'ico_path' => '图片地址',
            'cid' => '创建人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
