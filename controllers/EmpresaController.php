<?php

namespace app\controllers;

use Yii;
use app\models\Empresa;
use app\models\EmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
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
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empresa model.
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
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSuperlogin()
    {
    	$model = new Empresa();
    	$modelLogin = new LoginForm();
    	
    	if(isset(Yii::$app->user->identity->id))
    	{
    		return $this->redirect('/local');
    	}
    	
    	$post = Yii::$app->request->post();
    	if(!empty($post))
    	{
    		if(isset($post['login-button']))
    		{
    			$modelLogin->username = $post['LoginForm']['username'];
    			$modelLogin->password = sha1($post['LoginForm']['password']);
    			if($modelLogin->login())
    			{
	    			return $this->redirect('/local');
    			}
    		}
    		else 
    		{
	    		$db = \Yii::$app->db;
	    		$db->createCommand()->insert('user', [
						'username' => $post['LoginForm']['username'],
	    				'password' => sha1($post['LoginForm']['password']),
	    		])->execute();
	    		
	    		$model->ruc 		= $post['Empresa']['ruc'];
	    		$model->nombre 		= $post['Empresa']['nombre'];
	    		$model->telefono 	= $post['Empresa']['telefono'];
	    		$model->direccion 	= $post['Empresa']['direccion'];
	    		$model->id_rubro 	= $post['Empresa']['id_rubro'];
	    		$model->status 		= $post['Empresa']['status'];
	    		$model->id_user 	= $db->lastInsertID;
	    		$model->save();
	    		
	    		$modelLogin->username = $post['LoginForm']['username'];
	    		$modelLogin->password = $post['LoginForm']['password'];
	    		if($modelLogin->login())
	    		{
	    			return $this->redirect('/local');
	    		}
    		}
    	}
    	
    	return $this->render("superlogin", [
    			'model' => $model,
    			'modelLogin' => $modelLogin
    	]);
    	
    }
}
