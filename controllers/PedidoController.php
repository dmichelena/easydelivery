<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Local;
use yii\db\Query;
use app\models\Categoria;
use app\models\Producto;
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
			INNER JOIN
				empresa
			ON
				local.id_empresa = empresa.id_empresa
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
	
	public function actionProceso()
	{
		$session = \Yii::$app->session;
		
		if(!$session->has('usuario-web') or !isset($_GET['id']))
		{
			return $this->redirect("/registro");
		}
		
		$id_local = $_GET['id'];
		$categoria = (new Query())
					->select('categoria.nombre')
					->distinct("categoria.nombre")
					->from("categoria")
					->join("INNER JOIN", 'producto', 'categoria.id_producto = producto.id_producto')
					->where("producto.id_local = :id_local",[':id_local' => $id_local])
					->all();
		echo "<pre>";print_r($categoria);die();

		return $this->render('proceso');
	}
}