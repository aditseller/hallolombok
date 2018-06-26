<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id_book
 * @property string $package
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $id_number
 * @property string $created_at
 *
 * @property Package $package0
 */
class Booking extends \yii\db\ActiveRecord
{
	public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package', 'fullname', 'email', 'phone', 'id_number', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['package'], 'string', 'max' => 200],
            [['fullname', 'email'], 'string', 'max' => 100],
            [['phone', 'id_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['id_number'], 'unique'],
			[['verifyCode'],'captcha'],
            [['package'], 'exist', 'skipOnError' => true, 'targetClass' => Package::className(), 'targetAttribute' => ['package' => 'package']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_book' => 'Id Book',
            'package' => 'Package',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'id_number' => 'No Identitas (KTP/SIM)',
            'created_at' => 'Created At',
			'verifyCode' => 'Captcha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage0()
    {
        return $this->hasOne(Package::className(), ['package' => 'package']);
    }
}
