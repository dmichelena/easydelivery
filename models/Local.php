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
 * @property integer $id_user
 *
 * @property Delivery[] $deliveries
 * @property Empresa $idEmpresa
 * @property Turno $idTurno
 * @property User $idUser
 * @property Producto[] $productos
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
            [['zona_reparto_km', 'id_empresa', 'id_turno', 'id_user'], 'integer'],
            [['id_empresa', 'id_turno', 'id_user'], 'required'],
            [['status'], 'string'],
            [['nombre', 'direccion'], 'string', 'max' => 100],
            [['latitud', 'longitud'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 15]
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
            'id_user' => 'Id User',
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
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['id_local' => 'id_local']);
    }
}
