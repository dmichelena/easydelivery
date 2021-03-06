<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\DeliverySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_delivery') ?>

    <?= $form->field($model, 'destino_latitud') ?>

    <?= $form->field($model, 'destino_longitud') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'id_local') ?>

    <?php // echo $form->field($model, 'paso') ?>

    <?php // echo $form->field($model, 'justificacion_cancelado') ?>

    <?php // echo $form->field($model, 'costo_envio') ?>

    <?php // echo $form->field($model, 'id_transporte') ?>

    <?php // echo $form->field($model, 'tipo_comprobante') ?>

    <?php // echo $form->field($model, 'id_empresa') ?>

    <?php // echo $form->field($model, 'nombre_receptor') ?>

    <?php // echo $form->field($model, 'dni_receptor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
