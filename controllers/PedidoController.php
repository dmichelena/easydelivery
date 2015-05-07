<?php
namespace app\controllers;

use yii\web\Controller;
class PedidoController extends Controller
{
	public function actionProductos()
	{
		$session = \Yii::$app->session;
		
		if(!$session->has('usuario-web'))
		{
			return $this->redirect("/registro");
		}
		
		echo "<pre>";print_r($session);die();
	}
}