<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProductoLocal;
use app\models\search\ProductoLocalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductoLocalController implements the CRUD actions for ProductoLocal model.
 */
class ProductoLocalController extends Controller
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
     * Lists all ProductoLocal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoLocalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductoLocal model.
     * @param integer $id_producto
     * @param integer $id_local
     * @return mixed
     */
    public function actionView($id_producto, $id_local)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_producto, $id_local),
        ]);
    }

    /**
     * Creates a new ProductoLocal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductoLocal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductoLocal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_producto
     * @param integer $id_local
     * @return mixed
     */
    public function actionUpdate($id_producto, $id_local)
    {
        $model = $this->findModel($id_producto, $id_local);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductoLocal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_producto
     * @param integer $id_local
     * @return mixed
     */
    public function actionDelete($id_producto, $id_local)
    {
        $this->findModel($id_producto, $id_local)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductoLocal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_producto
     * @param integer $id_local
     * @return ProductoLocal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_producto, $id_local)
    {
        if (($model = ProductoLocal::findOne(['id_producto' => $id_producto, 'id_local' => $id_local])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
