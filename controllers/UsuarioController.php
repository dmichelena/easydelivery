<?php
namespace app\controllers

use yii\db\Query;

class UsuarioController extends \yii\web\Controller
{
    public function actionPedidos()
    {
        $model = (new Query())
            ->select("*")
            ->from("delivery")
            ->where([

            ])
    }
}