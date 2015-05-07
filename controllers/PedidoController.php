<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Local;
use yii\db\Query;
class PedidoController extends Controller
{
	public function actionProductos()
	{
		$session = \Yii::$app->session;
		
		if(!$session->has('usuario-web'))
		{
			return $this->redirect("/registro");
		}
		
		$sql = "
			SELECT 
				*,
				( 3959 * acos( cos( radians('%s') ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( latitud ) ) ) ) AS distance 
			FROM 
				local
			HAVING 
				distance < '100' 
			ORDER BY 
				distance 
			LIMIT 0 , 20";
		$sql = sprintf($sql, 
				$session['usuario-web']['latitud'],
				$session['usuario-web']['longitud'],
				$session['usuario-web']['latitud']
		);
  
		$model = \Yii::$app->db->createCommand($sql)->queryAll();
		
		return $this->render("productos",[
			'model' => $model,
		]);
	}
}