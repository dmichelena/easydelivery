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
				nombre, 
				( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance 
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
		echo "<pre>";print_r($sql);die();
  
		
		$model = (new Query())
					->select('address, name, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance')
					->from('local')
					->where('')
		
		return $this->render("productos");
	}
}