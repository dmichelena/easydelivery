<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'destino_latitud')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'destino_longitud')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'paso')->dropDownList([ 'cancelado' => 'Cancelado', 'enviado' => 'Enviado', 'en camino' => 'En camino', 'en proceso' => 'En proceso', 'no enviado' => 'No enviado', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'justificacion_cancelado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_transporte')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'id_local')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
