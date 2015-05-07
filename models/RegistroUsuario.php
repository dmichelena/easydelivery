<?php
namespace app\models;

use yii\db\ActiveRecord;
class RegistroUsuario extends ActiveRecord
{
	public $latitud;
	public $longitud;
	public $direccion;
}