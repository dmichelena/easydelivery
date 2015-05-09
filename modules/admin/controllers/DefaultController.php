<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->redirect("/admin/empresa/superlogin");
        return $this->render('index');
    }
}
