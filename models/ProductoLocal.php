<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_local".
 *
 * @property integer $id_producto
 * @property integer $id_local
 * @property integer $stock
 * @property double $precio
 * @property string $status
 *
 * @property Producto $idProducto
 * @property Local $idLocal
 */
class ProductoLocal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto_local';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_local', 'stock', 'precio', 'status'], 'required'],
            [['id_producto', 'id_local', 'stock'], 'integer'],
            [['precio'], 'number'],
            [['status'], 'string']
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
            'stock' => 'Stock',
            'precio' => 'Precio',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLocal()
    {
        return $this->hasOne(Local::className(), ['id_local' => 'id_local']);
    }
}
