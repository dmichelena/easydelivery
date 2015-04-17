<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido_p
 * @property string $apellido_m
 * @property string $password
 * @property string $fecha_nacimiento
 * @property string $dni
 * @property string $status
 * @property string $correo
 *
 * @property Delivery[] $deliveries
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido_p', 'apellido_m', 'password', 'fecha_nacimiento', 'dni', 'status', 'correo'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['status'], 'string'],
            [['nombre', 'apellido_p', 'apellido_m', 'password', 'correo'], 'string', 'max' => 45],
            [['dni'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apellido_p' => 'Apellido P',
            'apellido_m' => 'Apellido M',
            'password' => 'Password',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'dni' => 'Dni',
            'status' => 'Status',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveries()
    {
        return $this->hasMany(Delivery::className(), ['id_usuario' => 'id_usuario']);
    }
}
