<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id_delivery
 * @property string $destino_latitud
 * @property string $destino_longitud
 * @property string $telefono
 * @property string $status
 * @property integer $id_usuario
 * @property integer $id_local
 * @property string $paso
 * @property string $justificacion_cancelado
 * @property double $costo_envio
 * @property integer $id_transporte
 * @property string $tipo_comprobante
 * @property integer $id_empresa
 * @property string $nombre_receptor
 * @property string $dni_receptor
 *
 * @property Transporte $idTransporte
 * @property Usuario $idUsuario
 * @property Local $idLocal
 * @property Sunat $idEmpresa
 * @property Pedido[] $pedidos
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['destino_latitud', 'destino_longitud', 'telefono', 'status', 'id_usuario', 'id_local', 'paso'], 'required'],
            [['status', 'paso', 'justificacion_cancelado', 'tipo_comprobante'], 'string'],
            [['id_usuario', 'id_local', 'id_transporte', 'id_empresa'], 'integer'],
            [['costo_envio'], 'number'],
            [['destino_latitud', 'destino_longitud'], 'string', 'max' => 13],
            [['telefono'], 'string', 'max' => 15],
            [['nombre_receptor'], 'string', 'max' => 150],
            [['dni_receptor'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_delivery' => 'Id Delivery',
            'destino_latitud' => 'Destino Latitud',
            'destino_longitud' => 'Destino Longitud',
            'telefono' => 'Telefono',
            'status' => 'Status',
            'id_usuario' => 'Id Usuario',
            'id_local' => 'Id Local',
            'paso' => 'Paso',
            'justificacion_cancelado' => 'Justificacion Cancelado',
            'costo_envio' => 'Costo Envio',
            'id_transporte' => 'Id Transporte',
            'tipo_comprobante' => 'Tipo Comprobante',
            'id_empresa' => 'Id Empresa',
            'nombre_receptor' => 'Nombre Receptor',
            'dni_receptor' => 'Dni Receptor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTransporte()
    {
        return $this->hasOne(Transporte::className(), ['id_transporte' => 'id_transporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'id_usuario']);
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
    public function getIdEmpresa()
    {
        return $this->hasOne(Sunat::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['id_delivery' => 'id_delivery']);
    }
}
