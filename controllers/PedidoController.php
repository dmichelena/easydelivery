<?php
namespace app\controllers;

use app\models\ProductoLocal;
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

        $where = '';
        if(isset($_GET['id_rubro']))
        {
            $where = ' AND id_rubro = '.$_GET['id_rubro'].' ';
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
				distance < '20'
			ORDER BY
				distance
			LIMIT 0 , 20";
        $sql = sprintf($sql,
            $session['usuario-web']['latitud'],
            $session['usuario-web']['longitud'],
            $session['usuario-web']['latitud']
        );

        $modelTotal = \Yii::$app->db->createCommand($sql)->queryAll();

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
            WHERE 1 = 1 %s
			HAVING 
				distance < '20'
			ORDER BY 
				distance 
			LIMIT 0 , 20";
		$sql = sprintf($sql, 
				$session['usuario-web']['latitud'],
				$session['usuario-web']['longitud'],
				$session['usuario-web']['latitud'],
                $where
		);
  
		$model = \Yii::$app->db->createCommand($sql)->queryAll();

        $locales = [];
        foreach ($modelTotal as $m) {
            $locales[] = $m['id_local'];
        }

            $session['locales-web'] = $locales;

		
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
			$session['pedido'] = $post['cantidad'];
            $this->redirect("/pedido/resumen?id=".$_GET['id']);
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
            ->select('*, cateogira.nombre as categoria')
            ->from('producto')
            ->join("INNER JOIN", "producto_local", "producto.id_producto = producto_local.id_producto")
            ->join('INNER JOIN', "categoria", "categoria.id_categoria = producto.id_categoria")
            ->where("producto_local.id_local = :id_local", [
                ':id_local' => $id_local,
            ]);

        if(isset($_GET['id_categoria']))
        {
            $productos->andWhere(['producto.id_categoria' => $_GET['id_categoria']]);
        }

        $productos = $productos->all();

        echo "<pre>";print_r($productos);die();

				
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

    public function actionResumen()
    {
        $session = \Yii::$app->session;

        if(!$session->has('usuario-web') or !isset($_GET['id']) or !$session->has('pedido'))
        {
            return $this->redirect("/registro");
        }

        $post = \Yii::$app->request->post();
        if(!empty($post))
        {
            \Yii::$app->db->createCommand()->insert('delivery',
                [
                    'destino_latitud'               => $session['usuario-web']['latitud'],
                    'destino_longitud'              => $session['usuario-web']['longitud'],
                    'telefono'                      => $post['telefono'],
                    'status'                        => 'activo',
                    'id_usuario'                    => 1,
                    'id_local'                      => $_GET['id'],
                    'paso'                          => 'en proceso',
                    'costo_envio'                   => 10,
                    'id_transporte'                 => 1,
                    'tipo_comprobante'              => ($post['Comprobante'] == 2)?'boleta':'factura',
                    'nombre_receptor'               => $post['nombres'],
                    'dni_receptor'                  => $post['dni'],
                    'ruc_receptor'                  => $post['ruc'],
                    'razon_social_receptor'         => '',
                    'direccion_empresa_receptor'    => '',
                    'fecha_pedido'                  => date("Y-m-d"),
                    'fecha_entregado'               => '0000-00-00',
                ])->execute();

            $id_delivery = \Yii::$app->db->getLastInsertID();
            foreach($session['pedido'] as $p => $cant)
            {
                \Yii::$app->db->createCommand()->insert('pedido',[
                    'id_producto'   => $p,
                    'id_local'      => $_GET['id'],
                    'id_delivery'   => $id_delivery,
                    'cantidad'      => $cant,
                    'precio_unitario'        => 0,
                ])->execute();
            }

            $this->redirect("/pedido/exitosa");
        }

        $pedido = [];
        $sessionPedido = $session['pedido'];
        foreach($sessionPedido as $sp => $cant)
        {
            $producto = Producto::find()->where([
                'id_producto' => $sp
            ])->one();

            $productoLocal = ProductoLocal::find()->where([
                'id_producto'   => $sp,
                'id_local'      => $_GET['id']
            ])->one();
            $producto->precio = $productoLocal->precio;
            $pedido[$cant] = $producto;
        }

        //echo "<pre>";print_r($pedido);die();
        return $this->render("resumen", [
            'pedido' => $pedido
        ]);
    }

    public function actionDni()
    {
        $dni = (new Query)
            ->select('*')
            ->from('reniec')
            ->where([
                'dni' => $_GET['dni']
            ])
            ->all();
        if(count($dni) == 0)
        {
            echo json_encode(['status' => false, 'respuesta' => NULL]);
        }
        else
        {
            echo json_encode(['status' => true, 'respuesta' => $dni[0]]);
        }

    }

    public function actionExitosa()
    {
        return $this->render('exitosa');
    }
}