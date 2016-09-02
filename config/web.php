<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name'	=> 'EasyDelivery',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'admin'],
    'modules' => [
	    'admin' => [
	    	'class' => 'app\modules\admin\Module',
	    ],
    ],
    'components' => [
        'session' => [
            'class' => 'yii\web\CacheSession',
            //'db' => 'easydelivery',  // the application component ID of the DB connection. Defaults to 'db'.
            //'sessionTable' => 'my_session', // session table name. Defaults to 'session'.
        ],
    	'urlManager' => [
    		'enablePrettyUrl' => true,
    		'showScriptName' => false,
    	],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'olakeaze',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
