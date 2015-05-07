<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use app\models\Producto;
use Yii;
use app\models\Local;
use app\models\search\LocalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
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
        if(!$session->has('admin'))
        {
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_local]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        if(!empty($post))
        {
            $model = Local::find()->where('usuario = :username AND password = :password', [
                ':username' => $post['LoginForm']['username'],
                ':password' => $post['LoginForm']['password'],
            ])->one();

            if(!empty($model))
            {
                $session = \Yii::$app->session;
                $session['local'] = $model;

                $this->redirect('/admin/local/productos');
            }
            else
            {
                $modelLogin->addError("username", 'Usuario y/o password incorrectos');
            }
        }

        return $this->render('login',[
            'modelLogin' => $modelLogin,
        ]);
    }

    public function actionProductos()
    {
        $session = \Yii::$app->session;
        if(!$session->has('local'))
        {
            $this->redirect("/admin/local/login");
        }
        
        $post = Yii::$app->request->post();
        if(!empty($post))
        {
        	echo "<pre>";print_r($post);die();
        }

        $model = Producto::find()
            ->join("INNER JOIN", "local", "local.id_empresa = producto.id_empresa")
            ->where("id_local = :id_local",[
                ':id_local' => $session['local']->id_local,
            ])->all();
        
        return $this->render('productos',[
            "model" => $model,
        ]);
    }
}
