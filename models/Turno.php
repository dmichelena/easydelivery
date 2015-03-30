<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property integer $id_turno
 * @property string $nombre
 * @property string $inicio
 * @property string $fin
 *
 * @property Local[] $locals
 * @property Transporte[] $transportes
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inicio', 'fin'], 'safe'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_turno' => 'Id Turno',
            'nombre' => 'Nombre',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocals()
    {
        return $this->hasMany(Local::className(), ['id_turno' => 'id_turno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['id_turno' => 'id_turno']);
    }
}
