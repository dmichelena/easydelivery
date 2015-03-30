<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transporte".
 *
 * @property integer $id_transporte
 * @property string $nombre
 * @property string $apellido
 * @property string $dni
 * @property string $domicilio
 * @property string $telefono
 * @property string $licencia_conducir
 * @property string $placa_vehiculo
 * @property integer $id_turno
 * @property integer $id_local
 * @property string $status
 * @property integer $id_user
 *
 * @property Delivery[] $deliveries
 * @property Local $idLocal
 * @property Turno $idTurno
 * @property User $idUser
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
            [['id_turno', 'id_local', 'id_user'], 'required'],
            [['id_turno', 'id_local', 'id_user'], 'integer'],
            [['status'], 'string'],
            [['nombre', 'apellido'], 'string', 'max' => 45],
            [['dni'], 'string', 'max' => 10],
            [['domicilio'], 'string', 'max' => 100],
            [['telefono', 'licencia_conducir', 'placa_vehiculo'], 'string', 'max' => 15]
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
            'apellido' => 'Apellido',
            'dni' => 'Dni',
            'domicilio' => 'Domicilio',
            'telefono' => 'Telefono',
            'licencia_conducir' => 'Licencia Conducir',
            'placa_vehiculo' => 'Placa Vehiculo',
            'id_turno' => 'Id Turno',
            'id_local' => 'Id Local',
            'status' => 'Status',
            'id_user' => 'Id User',
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
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
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
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
