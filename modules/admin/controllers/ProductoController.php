<?php

namespace app\modules\admin\controllers;

use app\models\UploadForm;
use Yii;
use app\models\Producto;
use app\models\search\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
        }

        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelUpload = new UploadForm();
        $session = \Yii::$app->session;
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
        }

        $model = new Producto();

        if ($model->load(Yii::$app->request->post())) {
            $modelUpload->file = UploadedFile::getInstance($model, 'foto');

            if ($modelUpload->file && $modelUpload->validate()) {
                $modelUpload->file->saveAs('uploads/' . $modelUpload->file->baseName . '.' . $modelUpload->file->extension);
            }
            else
            {
                if($modelUpload->hasErrors())
                {
                    $error = $modelUpload->errors;

                    $model->addError("foto", $error['file'][0]);
                    return $this->render("create", [
                        'model' => $model
                    ]);
                }
            }

            if($model->save())
                return $this->redirect(['view', 'id' => $model->id_producto]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'session' => $session,
            ]);
        }
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_producto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
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
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
