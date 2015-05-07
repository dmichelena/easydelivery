<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RegistroController extends Controller
{
	public function actionIndex()
	{
		$post = \Yii::$app->request->post();
		if(!empty($post))
		{
			echo "<pre>";print_r($post);die();
		}
		
		return $this->render('index');
	}
	
}