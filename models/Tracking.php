<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tracking".
 *
 * @property integer $id_tracking
 * @property string $latitud
 * @property string $longitud
 * @property integer $id_delivery
 *
 * @property Delivery $idDelivery
 */
class Tracking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tracking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_delivery'], 'required'],
            [['id_delivery'], 'integer'],
            [['latitud', 'longitud'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tracking' => 'Id Tracking',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'id_delivery' => 'Id Delivery',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id_delivery' => 'id_delivery']);
    }
}
