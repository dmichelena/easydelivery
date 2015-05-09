<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_producto
 * @property string $nombre
 * @property string $foto
 * @property string $descipcion
 * @property integer $id_categoria
 * @property string $status
 * @property integer $id_empresa
 *
 * @property Categoria $idCategoria
 * @property Empresa $idEmpresa
 */
class Producto extends \yii\db\ActiveRecord
{
	public $stock;
    public $cantidad;
	public $precio;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'foto', 'descipcion', 'id_categoria', 'status', 'id_empresa'], 'required'],
            [['id_categoria', 'id_empresa'], 'integer'],
            [['status'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 150],
            [['descipcion'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'foto' => 'Foto',
            'descipcion' => 'Descipcion',
            'id_categoria' => 'Id Categoria',
            'status' => 'Status',
            'id_empresa' => 'Id Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id_empresa' => 'id_empresa']);
    }
}
