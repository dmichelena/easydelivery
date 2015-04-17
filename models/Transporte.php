<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transporte".
 *
 * @property integer $id_transporte
 * @property string $nombre
 * @property string $apellido_p
 * @property string $apellido_m
 * @property string $domicilio
 * @property string $telefono
 * @property string $licencia_conducir
 * @property string $placa_vehiculo
 * @property integer $id_turno
 * @property integer $id_local
 * @property string $status
 * @property string $longitud
 * @property string $latitud
 * @property string $usuario
 * @property string $password
 *
 * @property Delivery[] $deliveries
 * @property Turno $idTurno
 * @property Local $idLocal
 */
class Transporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido_p', 'apellido_m', 'domicilio', 'telefono', 'licencia_conducir', 'placa_vehiculo', 'id_turno', 'id_local', 'status', 'usuario', 'password'], 'required'],
            [['id_turno', 'id_local'], 'integer'],
            [['status'], 'string'],
            [['nombre', 'apellido_p', 'usuario', 'password'], 'string', 'max' => 45],
            [['apellido_m'], 'string', 'max' => 10],
            [['domicilio'], 'string', 'max' => 100],
            [['telefono', 'licencia_conducir'], 'string', 'max' => 15],
            [['placa_vehiculo'], 'string', 'max' => 7],
            [['longitud', 'latitud'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transporte' => 'Id Transporte',
            'nombre' => 'Nombre',
            'apellido_p' => 'Apellido P',
            'apellido_m' => 'Apellido M',
            'domicilio' => 'Domicilio',
            'telefono' => 'Telefono',
            'licencia_conducir' => 'Licencia Conducir',
            'placa_vehiculo' => 'Placa Vehiculo',
            'id_turno' => 'Id Turno',
            'id_local' => 'Id Local',
            'status' => 'Status',
            'longitud' => 'Longitud',
            'latitud' => 'Latitud',
            'usuario' => 'Usuario',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['id_transporte' => 'id_transporte']);
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
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
    }
}
