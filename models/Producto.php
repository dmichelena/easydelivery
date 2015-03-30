<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_producto
 * @property string $nombre
 * @property string $descipcion
 * @property integer $stock
 * @property double $precio_unitario
 * @property string $foto
 * @property double $precio_envio
 * @property integer $id_categoria
 * @property integer $id_local
 * @property string $status
 *
 * @property Pedido[] $pedidos
 * @property Categoria $idCategoria
 * @property Local $idLocal
 */
class Producto extends \yii\db\ActiveRecord
{
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
            [['descipcion', 'status'], 'string'],
            [['stock', 'id_categoria', 'id_local'], 'integer'],
            [['precio_unitario', 'precio_envio'], 'number'],
            [['id_categoria', 'id_local'], 'required'],
            [['nombre'], 'string', 'max' => 50],
            [['foto'], 'string', 'max' => 100]
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
            'descipcion' => 'Descipcion',
            'stock' => 'Stock',
            'precio_unitario' => 'Precio Unitario',
            'foto' => 'Foto',
            'precio_envio' => 'Precio Envio',
            'id_categoria' => 'Id Categoria',
            'id_local' => 'Id Local',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_producto' => 'id_producto']);
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
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
    }
}
