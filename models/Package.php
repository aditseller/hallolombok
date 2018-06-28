<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property int $id_package
 * @property string $type
 * @property string $package
 * @property string $price
 * @property string $detail
 *
 * @property Booking[] $bookings
 * @property TypePackage $type0
 */
class Package extends \yii\db\ActiveRecord
{
	public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'package', 'price', 'detail'], 'required'],
            [['detail'], 'string'],
            [['type'], 'string', 'max' => 100],
            [['package'], 'string', 'max' => 300],
            [['price'], 'string', 'max' => 20],
            [['package','url'], 'unique'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => TypePackage::className(), 'targetAttribute' => ['type' => 'type']],
			[['image'], 'image','extensions'=>'jpg,png','maxSize' => 5000000, ],
		];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_package' => 'Id Package',
            'type' => 'Type',
            'package' => 'Package',
            'price' => 'Price',
            'detail' => 'Detail',
			'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['package' => 'package']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(TypePackage::className(), ['type' => 'type']);
    }
	
	public function beforeSave($insert) {
		
		 $entities = array('?',' ');
		 $replacements = array('','-');
		 $this->url = str_replace($entities, $replacements, $this->package);
		
		
		return parent::beforeSave($insert);
	}
}
