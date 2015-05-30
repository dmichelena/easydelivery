<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "local".
 *
 * @property integer $id_local
 * @property string $nombre
 * @property string $direccion
 * @property string $latitud
 * @property string $longitud
 * @property string $telefono
 * @property integer $zona_reparto_km
 * @property integer $id_empresa
 * @property integer $id_turno
 * @property string $status
 * @property double $costo_envio
 * @property string $usuario
 * @property string $password
 *
 * @property Delivery[] $deliveries
 * @property Empresa $idEmpresa
 * @property Turno $idTurno
 * @property Transporte[] $transportes
 */
class Local extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'latitud', 'longitud', 'telefono', 'zona_reparto_km', 'id_empresa', 'id_turno', 'status', 'usuario', 'password'], 'required'],
            [['zona_reparto_km', 'id_empresa', 'id_turno'], 'integer'],
            [['status'], 'string'],
            [['costo_envio'], 'number'],
            [['nombre', 'direccion'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 15],
            [['usuario', 'password'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_local' => 'Id Local',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'telefono' => 'Telefono',
            'zona_reparto_km' => 'Zona Reparto Km',
            'id_empresa' => 'Id Empresa',
            'id_turno' => 'Id Turno',
            'status' => 'Status',
            'costo_envio' => 'Costo Envio',
            'usuario' => 'Usuario',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurno()
    {
        return $this->hasOne(Turno::className(), ['id_turno' => 'id_turno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['id_local' => 'id_local']);
    }
}
