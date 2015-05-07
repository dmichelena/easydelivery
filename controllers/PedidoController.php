<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Local;
use yii\db\Query;
use app\models\Categoria;
use app\models\Producto;
use app\models\Empresa;
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
		
		$post = \Yii::$app->request->post();
		if(!empty($post))
		{
			echo "<pre>";print_r($post);die();
		}
		
		$categoria = (new Query())
					->select('categoria.nombre, categoria.id_categoria')
					->distinct("categoria.nombre")
					->from("categoria")
					->join("INNER JOIN", 'producto', 'categoria.id_categoria = producto.id_categoria')
					->join("INNER JOIN", "producto_local", "producto_local.id_producto = producto.id_producto")
					->where("producto_local.id_local = :id_local",[':id_local' => $id_local])
					->all();
		
		$productos = (new Query())
			->select('*')
			->from('producto')
			->join("INNER JOIN", "producto_local", "producto.id_producto = producto_local.id_producto")
			->where("producto_local.id_local = :id_local AND producto.id_categoria = :id_categoria", [
					':id_local' 	=> $id_local,
					':id_categoria'	=> $categoria[0]['id_categoria']
			])
			->all();
				
		$empresa = Empresa::find()
			->join("INNER JOIN", "local", "empresa.id_empresa = local.id_empresa")
			->where("local.id_local = :id_local", [':id_local' => $id_local])
			->one();
		
		return $this->render('proceso',[
				'categoria' => $categoria,
				'productos'	=> $productos,
				'empresa'	=> $empresa,
		]);
	}
}