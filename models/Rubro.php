<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubro".
 *
 * @property integer $id_rubro
 * @property string $nombre
 * @property string $status
 *
 * @property Empresa[] $empresas
 */
class Rubro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rubro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'status'], 'required'],
            [['status'], 'string'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rubro' => 'Id Rubro',
            'nombre' => 'Nombre',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['id_rubro' => 'id_rubro']);
    }
}
