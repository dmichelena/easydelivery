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

        echo "<pre>";print_r($model);die();
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