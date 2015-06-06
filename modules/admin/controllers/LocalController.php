<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use app\models\Producto;
use app\models\Transporte;
use app\models\ProductoLocal;
use app\models\Delivery;
use Yii;
use app\models\Local;
use app\models\search\LocalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * LocalController implements the CRUD actions for Local model.
 */
class LocalController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Local models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        if ($session->has('local')) {
            //print_r($session);die();
            $this->redirect("/admin/local/productos");
        }else{
            if (!$session->has('admin')) {
                $this->redirect("/admin/local/login");
            }
        }
        $searchModel = new LocalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Local model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Local model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = \Yii::$app->session;
        if (!$session->has('admin')) {
            $this->redirect("/admin/empresa/superlogin");
        }

        $model = new Local();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_local]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'session' => $session['admin'],
            ]);
        }
    }

    /**
     * Updates an existing Local model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = \Yii::$app->session;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_local]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'session' => $session['admin'],
            ]);
        }
    }

    /**
     * Deletes an existing Local model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Local model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Local the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Local::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogin()
    {
        $modelLogin = new LoginForm();

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $model = Local::find()->where('usuario = :username AND password = :password', [
                ':username' => $post['LoginForm']['username'],
                ':password' => $post['LoginForm']['password'],
            ])->one();

            if (!empty($model)) {
                $session = \Yii::$app->session;
                $session['local'] = $model;

                $this->redirect('/admin/local/productos');
            } else {
                $modelLogin->addError("username", 'Usuario y/o password incorrectos');
            }
        }

        return $this->render('login', [
            'modelLogin' => $modelLogin,
        ]);
    }

    public function actionProductos()
    {
        $session = \Yii::$app->session;
        if (!$session->has('local')) {
            $this->redirect("/admin/local/login");
        }

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $insert = [];
            foreach ($post['Producto'] as $producto) {
                if ($producto['id_producto'] != 0) {
                    $producto_local = ProductoLocal::find()->where([
                        'id_producto' => $producto['id_producto'],
                        'id_local' => $session['local']->id_local
                    ])->one();

                    if (!empty($producto_local)) {
                        $producto_local->stock = $producto['stock'];
                        $producto_local->precio = $producto['precio'];
                        $producto_local->save();
                    } else {
                        $insert[] = [
                            $producto['id_producto'],
                            $session['local']->id_local,
                            $producto['stock'],
                            $producto['precio'],
                            'activo'
                        ];
                    }
                }
            }
            if (count($insert) > 0) {
                \Yii::$app->db->createCommand()->batchInsert('producto_local', ['id_producto', 'id_local', 'stock', 'precio', 'status'], $insert)->execute();

                return $this->redirect("/admin/producto-local");
            }
        }

        $model = Producto::find()
            ->join("INNER JOIN", "local", "local.id_empresa = producto.id_empresa")
            ->where("id_local = :id_local", [
                ':id_local' => $session['local']->id_local,
            ])->all();

        $model2 = [];
        foreach ($model as $m) {
            $producto_local = ProductoLocal::find()->where([
                'id_producto' => $m->id_producto,
                'id_local' => $session['local']->id_local
            ])->one();

            if (!empty($producto_local)) {
                $m['precio'] = $producto_local->precio;
                $m['stock'] = $producto_local->stock;
            }

            $model2[] = $m;
        }

        return $this->render('productos', [
            "model" => $model2,
        ]);
    }

    public function actionAsignar()
    {
        $session = \Yii::$app->session;
        if (!$session->has('local')) {
            $this->redirect("/admin/local/login");
        }
        $flag=false;
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            foreach ($post["Delivery"] as $id_delivery => $id_transporte){
                $deli=$id_delivery;
                $trans=$id_transporte["id_transporte"];
                if(!empty($trans)){
                    $sql = "UPDATE delivery SET paso='en camino', id_transporte=%s where id_delivery=%s";
                    $sql = sprintf($sql, $trans, $deli);
                    Yii::$app->db->createCommand($sql)->execute();
                    $flag=true;
                }
            }
        }
        $delivery = Delivery::find()
            ->where("paso=:paso and id_local=:id_local", [":paso" => "en proceso", ':id_local' => $session['local']->id_local])
            ->all();
        $transporte = Transporte::find()
            ->where("id_local=:id_local", [':id_local' =>$session['local']->id_local])
            ->all();
        $tmp=array();
        foreach ($transporte as $t) {
            array_push($tmp,[$t['id_transporte'] => $t['nombre'].' '.$t['apellido_p'].' '.$t['apellido_m']]);
        }
        return $this->render('asignar', [
            "grabo" => $flag,
            "delivery" => $delivery,
            "transporte" => $tmp,
        ]);
        //print_r( $delivery);die();
    }

    public function actionPedidos()
    {
        $session = \Yii::$app->session;
        if (!$session->has('local')) {
            $this->redirect("/admin/local/login");
        }
        $delivery = (new Query())
            ->select('*')
            ->from('delivery')
            ->join("INNER JOIN", "transporte", "delivery.id_transporte = transporte.id_transporte")
            ->where("paso=:paso and delivery.id_local=:id_local", [":paso" => "en camino", ':id_local' => $session['local']->id_local])
            ->all();
        return $this->render('pedidos', [
            "delivery" => $delivery,
        ]);
    }
    public function actionSeguimiento()
    {
        $session = \Yii::$app->session;
        if (!$session->has('local')) {
            $this->redirect("/admin/local/login");
        }
        $get = \Yii::$app->request->get();
        if(empty($get)){
            return $this->redirect("/admin/local/pedidos");
        }
        $transporte = (new Query())
            ->select("id_transporte,nombre, apellido_p, apellido_m, longitud,latitud")
            ->from("transporte")
            ->where([
                'id_transporte' => $get['id_transporte'],
                'id_local' => $session['local']->id_local
            ])
            ->all();
        if(count($transporte)==0){
            return $this->redirect("/admin/local/pedidos");
        }
        return $this->render("seguimiento", [
            'transporte' => $transporte[0],
        ]);
    }
    public function actionLogout()
    {
        $session = \Yii::$app->session;

        $session->remove('local');
        $this->redirect("/admin/local/login");
    }
}
