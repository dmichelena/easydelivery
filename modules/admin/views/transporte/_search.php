<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TransporteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_transporte') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido_p') ?>

    <?= $form->field($model, 'apellido_m') ?>

    <?= $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'licencia_conducir') ?>

    <?php // echo $form->field($model, 'placa_vehiculo') ?>

    <?php // echo $form->field($model, 'id_turno') ?>

    <?php // echo $form->field($model, 'id_local') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
