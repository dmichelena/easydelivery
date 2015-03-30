<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $id_empresa
 * @property string $nombre
 * @property string $ruc
 * @property string $telefono
 * @property string $direccion
 * @property integer $id_rubro
 * @property string $status
 * @property integer $id_user
 *
 * @property Rubro $idRubro
 * @property User $idUser
 * @property Local[] $locals
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rubro', 'id_user'], 'required'],
            [['id_rubro', 'id_user'], 'integer'],
            [['status'], 'string'],
            [['nombre', 'direccion'], 'string', 'max' => 100],
            [['ruc'], 'string', 'max' => 20],
            [['telefono'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'nombre' => 'Nombre',
            'ruc' => 'Ruc',
            'telefono' => 'Telefono',
            'direccion' => 'Direccion',
            'id_rubro' => 'Id Rubro',
            'status' => 'Status',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRubro()
    {
        return $this->hasOne(Rubro::className(), ['id_rubro' => 'id_rubro']);
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
    public function getLocals()
    {
        return $this->hasMany(Local::className(), ['id_empresa' => 'id_empresa']);
    }
}
