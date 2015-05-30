<?php
namespace app\modules\admin\controllers;


use yii\db\Query;
use yii\web\Controller;

class ReporteController extends Controller
{

    public function actionIndex()
    {
        $session = \Yii::$app->session;
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
        }

        $productosVendidos = (new Query())
            ->select("producto.*, SUM(pedido.cantidad) as vendido")
            ->from("producto")
            ->join("INNER JOIN", "pedido", "pedido.id_producto = producto.id_producto")
            ->join("INNER JOIN", "local", "local.id_local = pedido.id_local")
            ->where(["local.id_empresa" => $session['admin']->id])
            ->groupBy(['producto.id_producto'])
            ->orderBy('SUM(pedido.cantidad) DESC')
            ->all();


        return $this->render('index',
            [
                'productoVendido' => $productosVendidos,
            ]);
    }

}