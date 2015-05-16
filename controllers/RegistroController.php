<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RegistroController extends Controller
{
	public function actionIndex()
	{
        $session = \Yii::$app->session;

        if(!$session->has('usuario-webos'))
        {
            return $this->redirect("/registro");
        }

        $query = (new Query())
            ->select("*")
            ->from("reniec")
            ->where([
                "dni" => $session['usuario-webos']->dni;
            ])

		$post = \Yii::$app->request->post();
		if(!empty($post))
		{
			if(!empty($post['latitud']))
			{
				$session = \Yii::$app->session;
				$session['usuario-web'] = $post;
			
				return $this->redirect("/pedido/productos");
			}
		}
		
		return $this->render('index');
	}
	
}