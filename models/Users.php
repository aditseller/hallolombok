<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property int $role
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Roles $role0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fullname', 'role', 'authKey', 'accessToken'], 'required'],
            [['role'], 'integer'],
            [['email', 'fullname'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 500],
            [['authKey', 'accessToken'], 'string', 'max' => 300],
            [['email'], 'unique'],
            [['fullname'], 'unique'],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role' => 'id_role']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'email' => 'Email',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'role' => 'Role',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Roles::className(), ['id_role' => 'role']);
    }
}
