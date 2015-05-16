<?php

namespace app\controllers;

use app\models\Usuario;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                	[
                		'actions' => ['login', 'error'],
                		'allow' => true,
                	],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['login']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
        //return $this->render('index');
    }

    public function actionLogin()
    {
        $session = \Yii::$app->session;

        if($session->has('usuario-webos'))
        {
            return $this->redirect("/registro");
        }

        $model = new Usuario();

        $post = \Yii::$app->request->post();
        if(!empty($post))
        {
            $user = $model->find()->where([
                'correo' => $post['Usuario']['correo'],
                'password' => $post['Usuario']['password'],
            ])->all();

            if(!empty($user))
            {
                $session['usuario-webos'] = $user;
                $this->redirect("/registro");
            }
        }


        return $this->render('login', [
            'model' => $model,
        ]);

    }

    public function actionLogout()
    {
        $session = \Yii::$app->session;

        unset($session->has('usuario-webos'));

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
