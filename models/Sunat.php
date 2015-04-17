<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sunat".
 *
 * @property integer $id_empresa
 * @property string $ruc
 * @property string $razon_social
 * @property string $direccion
 *
 * @property Delivery[] $deliveries
 */
class Sunat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sunat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruc', 'razon_social', 'direccion'], 'required'],
            [['ruc'], 'string', 'max' => 11],
            [['razon_social'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'ruc' => 'Ruc',
            'razon_social' => 'Razon Social',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['id_empresa' => 'id_empresa']);
    }
}
