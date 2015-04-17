<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id_producto
 * @property integer $id_local
 * @property integer $id_delivery
 * @property integer $cantidad
 * @property double $precio_unitario
 *
 * @property ProductoLocal $idProducto
 * @property Delivery $idDelivery
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_local', 'id_delivery', 'cantidad', 'precio_unitario'], 'required'],
            [['id_producto', 'id_local', 'id_delivery', 'cantidad'], 'integer'],
            [['precio_unitario'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'id_local' => 'Id Local',
            'id_delivery' => 'Id Delivery',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio Unitario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(ProductoLocal::className(), ['id_producto' => 'id_producto', 'id_local' => 'id_local']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id_delivery' => 'id_delivery']);
    }
}
