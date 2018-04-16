<?php

namespace common\models\gii;

use Yii;

/**
 * This is the model class for table "zfb_cust".
 *
 * @property string $cust_id 客户ID
 * @property int $customer_id 会员中心的客户ID
 * @property string $cust_name 客户名字
 * @property int $cust_sex 性别，0表示男，1表示女
 * @property string $cust_alias 客户别名
 * @property string $cust_phone 绑定电话
 * @property string $cust_email
 * @property string $security_passwd 安全密码
 * @property int $is_admin 0表示不是管理员，1表示后台管理员
 * @property int $admin_id 管理员ID
 * @property int $cid 添加人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 */
class ZfbCustGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zfb_cust';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'cust_sex', 'is_admin', 'admin_id', 'cid', 'uid', 'is_del'], 'integer'],
            [['ctime', 'utime'], 'safe'],
            [['cust_name', 'cust_alias'], 'string', 'max' => 30],
            [['cust_phone'], 'string', 'max' => 12],
            [['cust_email'], 'string', 'max' => 255],
            [['security_passwd'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cust_id' => '客户ID',
            'customer_id' => '会员中心的客户ID',
            'cust_name' => '客户名字',
            'cust_sex' => '性别，0表示男，1表示女',
            'cust_alias' => '客户别名',
            'cust_phone' => '绑定电话',
            'cust_email' => 'Cust Email',
            'security_passwd' => '安全密码',
            'is_admin' => '0表示不是管理员，1表示后台管理员',
            'admin_id' => '管理员ID',
            'cid' => '添加人ID',
            'uid' => '修改人ID',
            'ctime' => '添加时间',
            'utime' => '修改时间',
            'is_del' => '0表示不删除，1表示删除',
        ];
    }
}
