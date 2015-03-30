<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id_pedido
 * @property integer $cantidad
 * @property double $precio_unitario
 * @property integer $id_producto
 * @property integer $id_delivery
 * @property string $status
 *
 * @property Delivery $idDelivery
 * @property Producto $idProducto
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
            [['cantidad', 'id_producto', 'id_delivery'], 'integer'],
            [['precio_unitario'], 'number'],
            [['id_producto', 'id_delivery'], 'required'],
            [['status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => 'Id Pedido',
            'cantidad' => 'Cantidad',
            'precio_unitario' => 'Precio Unitario',
            'id_producto' => 'Id Producto',
            'id_delivery' => 'Id Delivery',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDelivery()
    {
        return $this->hasOne(Delivery::className(), ['id_delivery' => 'id_delivery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }
}
