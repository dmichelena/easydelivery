<?php
namespace app\modules\admin\controllers;


use yii\web\Controller;

class ReporteController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }

}