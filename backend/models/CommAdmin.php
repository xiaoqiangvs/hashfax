<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "zfb_admin".
 *
 * @property int $admin_id 管理员ID
 * @property string $account 账号
 * @property string $passwd 密码
 * @property string $ico_path 图片地址
 * @property int $cid 创建人ID
 * @property int $uid 修改人ID
 * @property string $ctime 添加时间
 * @property string $utime 修改时间
 * @property int $is_del 0表示不删除，1表示删除
 * @property int $role
 */
class CommAdmin extends \yii\db\ActiveRecord
{
    private $_user;
    const  SALT = 'd6eb7971607110c042aa6bb300ad2d4286de721fb66320123a7ff7f00866d1f3';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zfb_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account'], 'string', 'max' => 10],
            [['passwd', 'ico_path'], 'string', 'max' => 50],
            ['passwd','validatePassword']
        ];
    }

    /**
     * @inheritdoc
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
            'role' => 'Role',
        ];
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if(empty($this->account)||strlen($this->account)<3){
                $this->addError($attribute, '用户名必须大于3位');
        }
        if(empty($this->passwd)||strlen($this->passwd)<6){
            $this->addError($attribute, '密码必须大于6位');
        }
            if (!$user || $user['passwd'] != md5(self::SALT . $this->passwd)) {
                $this->addError($attribute, '用户名、密码错误');
            }
            $session = Yii::$app->session;
            $session->set('user',$user);
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return true;
        }

        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = CommAdmin::findOne(['account' => $this->account]);
        }

        return $this->_user;
    }

}
