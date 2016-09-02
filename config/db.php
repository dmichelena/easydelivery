<?php
$user = getenv('USER_DB') ? getenv('USER_DB') : 'root';
$pass = getenv('PASS_DB') ? getenv('PASS_DB') : '';
$db = getenv('DB') ? getenv('DB') : 'root';
$host = getenv('HOST_DB') ? getenv('HOST_DB') : 'root';
return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host={$host};dbname={$db}",
    'username' => $user,
    'password' => $pass,
    'charset' => 'utf8',
];
