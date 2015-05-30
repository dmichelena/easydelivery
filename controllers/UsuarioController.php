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

    public function actionDetalle($id_pedido)
    {
        echo $id_pedido;die();
    }

    public function actionSeguimiento()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }


    }
    public function actionDetalle()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/");
        }


    }
}