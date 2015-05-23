<?php
namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\helpers\ArrayHelper;

class WsController extends ActiveController
{
    //MODELO AGREGADO SOLO PARA EVITAR ERROR....
    public $modelClass = 'app\models\Turno';

    public function actionPedidos()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $sql = "SELECT delivery.id_delivery,nombre_receptor,sum(cantidad*precio_unitario)+costo_envio as monto, destino_longitud, destino_latitud
        FROM delivery
        INNER JOIN pedido ON delivery.id_delivery=pedido.id_delivery
        INNER JOIN usuario ON delivery.id_usuario=usuario.id_usuario
        WHERE paso='en camino' and id_transporte=%s
        GROUP BY id_delivery";
        $sql = sprintf($sql, $request['id_transporte']);
        $pedidos = Yii::$app->db->createCommand($sql)->queryAll();
        return $pedidos;
    }

    public function actionDetalle()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $sql = "SELECT delivery.id_delivery,nombre_receptor,producto.nombre as producto,cantidad,precio_unitario, costo_envio
            FROM delivery
            INNER JOIN pedido ON delivery.id_delivery=pedido.id_delivery
            INNER JOIN usuario ON delivery.id_usuario=usuario.id_usuario
            INNER JOIN producto ON producto.id_producto=pedido.id_producto
            WHERE delivery.id_delivery=%s";
        $sql = sprintf($sql, $request['id_delivery']);
        $detalle = Yii::$app->db->createCommand($sql)->queryAll();
        $productos = array();
        $total = 0;
        foreach ($detalle as $d) {
            array_push($productos, [
                'producto' => $d['producto'],
                'cantidad' => $d['cantidad'],
                'precio_unitario' => $d['precio_unitario']
            ]);
            $total += $d['cantidad'] * $d['precio_unitario'];
        }
        $total += $detalle[0]['costo_envio'];
        $respuesta = [
            'id_delivery' => $detalle[0]['id_delivery'],
            'nombre_receptor' => $detalle[0]['nombre_receptor'],
            'productos' => $productos,
            'costo_envio' => $detalle[0]['costo_envio'],
            'total' => $total,
        ];
        return $respuesta;
    }

    public function actionActualizar()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $sql = "UPDATE delivery SET paso='%s' where id_delivery=%s";
        if ($request['estado'] == 1) {
            $paso = 'enviado';
        } else {
            $paso = 'cancelado';
        }
        $sql = sprintf($sql, $paso, $request['id_delivery']);
        Yii::$app->db->createCommand($sql)->execute();
        return ["respuesta"=>true];
    }
    public function actionPosicion()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $sql = "UPDATE transporte SET longitud=%s,latitud=%s where id_transporte=%s";
        $sql = sprintf($sql, $request['longitud'],$request['latitud'], $request['id_transporte']);
        Yii::$app->db->createCommand($sql)->execute();
        return $sql;
    }

    public function actionAutenticar()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->post();
        $id_transporte = (new Query())
            ->select('id_transporte')
            ->from('transporte')
            ->where("usuario = :usuario AND password = :password", [
                ':usuario' => $request['user'],
                ':password' => $request['pass']
            ]);
        $id_transporte = $id_transporte->all();
        if (count($id_transporte) == 0) {
            return ["id_transporte" => "-1"];
        }
        return $id_transporte[0];
    }
}