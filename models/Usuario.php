<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $password
 * @property string $fecha_nacimiento
 * @property string $dni
 * @property string $status
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
            [['fecha_nacimiento'], 'safe'],
            [['status'], 'string'],
            [['nombre', 'apellido', 'correo', 'password'], 'string', 'max' => 45],
            [['dni'], 'string', 'max' => 10]
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
            'apellido' => 'Apellido',
            'correo' => 'Correo',
            'password' => 'Password',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'dni' => 'Dni',
            'status' => 'Status',
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
