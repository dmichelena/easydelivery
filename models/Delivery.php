<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id_delivery
 * @property string $destino_latitud
 * @property string $destino_longitud
 * @property string $telefono
 * @property string $status
 * @property string $paso
 * @property string $justificacion_cancelado
 * @property integer $id_transporte
 * @property integer $id_usuario
 * @property integer $id_local
 *
 * @property Local $idLocal
 * @property Transporte $idTransporte
 * @property Usuario $idUsuario
 * @property Pedido[] $pedidos
 * @property Tracking[] $trackings
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'paso', 'justificacion_cancelado'], 'string'],
            [['id_transporte', 'id_usuario', 'id_local'], 'required'],
            [['id_transporte', 'id_usuario', 'id_local'], 'integer'],
            [['destino_latitud', 'destino_longitud', 'telefono'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_delivery' => 'Id Delivery',
            'destino_latitud' => 'Destino Latitud',
            'destino_longitud' => 'Destino Longitud',
            'telefono' => 'Telefono',
            'status' => 'Status',
            'paso' => 'Paso',
            'justificacion_cancelado' => 'Justificacion Cancelado',
            'id_transporte' => 'Id Transporte',
            'id_usuario' => 'Id Usuario',
            'id_local' => 'Id Local',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTransporte()
    {
        return $this->hasOne(Transporte::className(), ['id_transporte' => 'id_transporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_delivery' => 'id_delivery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrackings()
    {
        return $this->hasMany(Tracking::className(), ['id_delivery' => 'id_delivery']);
    }
}
