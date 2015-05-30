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

        $model = (new Query())
            ->select("*")
            ->from("delivery")
            ->where([
                'id_usuario' => $session['usuario-webos']->id_usuario,
            ])
            ->all();

        return $this->render("pedidos", [
            'model' => $model,
        ]);
    }

    public function actionDetalle($id_delivery)
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }
<<<<<<< HEAD
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
=======

        $model = (new Query())
            ->select("*")
            ->from("delivery")
            ->join("INNER JOIN", "pedido", "pedido.id_delivery = delivery.id_delivery")
            ->join("INNER JOIN", "local", "local.id_local = pedido.id_local")
            ->join("INNER JOIN", "producto", "producto.id_producto = pedido.id_producto")
            ->where([
                'delivery.id_delivery' => $id_delivery
            ])
            ->all();
>>>>>>> d5bc26dd6d992f579183fd2170647fde9ee9f3c5

        return $this->render("detalle",[
            'model' => $model
        ]);
    }

    public function actionSeguimiento()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }

    }
}