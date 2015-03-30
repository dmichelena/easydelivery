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
 * @property integer $stock
 * @property double $precio_unitario
 * @property double $precio_envio
 * @property integer $id_categoria
 * @property integer $id_local
 * @property string $status
 * @property integer $id_user
 *
 * @property Pedido[] $pedidos
 * @property Categoria $idCategoria
 * @property Local $idLocal
 * @property User $idUser
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
            [['stock', 'id_categoria', 'id_local', 'id_user'], 'integer'],
            [['precio_unitario', 'precio_envio'], 'number'],
            [['id_categoria', 'id_local', 'id_user'], 'required'],
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
            'foto' => 'Foto',
            'descipcion' => 'Descipcion',
            'stock' => 'Stock',
            'precio_unitario' => 'Precio Unitario',
            'precio_envio' => 'Precio Envio',
            'id_categoria' => 'Id Categoria',
            'id_local' => 'Id Local',
            'status' => 'Status',
            'id_user' => 'Id User',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
