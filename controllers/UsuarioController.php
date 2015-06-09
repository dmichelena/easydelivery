<?php
namespace app\controllers;

use yii\db\Query;

class UsuarioController extends \yii\web\Controller
{
    public function actionPedidos()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }

        $pedidos = (new Query())->select("id_delivery")->from("pedido")->where('<>', 'cantidad', '0')->groupBy("id_delivery")->all();
        echo "<pre>";print_r($pedidos);die();
        
        $model = (new Query())
            ->select("*")
            ->from("delivery")
            ->where([
                'id_usuario' => $session['usuario-webos']->id_usuario,
            ])
            ->andWhere([
				'id_delivery' => $pedidos
    	    ])
            ->orderBy("id_delivery DESC")
            ->all();

        return $this->render("pedidos", [
            'model' => $model,
        ]);
    }
    public function actionSeguimiento()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }
        $get = \Yii::$app->request->get();
        if(empty($get)){
            return $this->redirect("/usuario/pedidos");
        }
        $pedido = (new Query())
            ->select("id_delivery, nombre, apellido_p, apellido_m, longitud,latitud, paso")
            ->from("delivery")
            ->join("INNER JOIN", 'transporte', 'delivery.id_transporte=transporte.id_transporte')
            ->where([
                'id_delivery' => $get['id_delivery']
            ])
            ->all();
        if(count($pedido)==0||$pedido[0]['paso']!='en camino'){
            return $this->redirect("/usuario/pedidos");
        }
        return $this->render("seguimiento", [
            'pedido' => $pedido[0],
        ]);

    }
    public function actionDetalle($id_delivery)
    {
        $session = \Yii::$app->session;
        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }
        $model = (new Query())
            ->select("*, local.nombre as local_nombre")
            ->from("delivery")
            ->join("INNER JOIN", "pedido", "pedido.id_delivery = delivery.id_delivery")
            ->join("INNER JOIN", "local", "local.id_local = pedido.id_local")
            ->join("INNER JOIN", "producto", "producto.id_producto = pedido.id_producto")
            ->where([
                	'delivery.id_delivery' => $id_delivery,
            ])
            ->andWhere("<>", "pedido.cantidad", 0)
            ->all();
        return $this->render("detalle",[
            'model' => $model
        ]);
    }
}
