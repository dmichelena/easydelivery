<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Turno;
use app\models\Local;

/* @var $this yii\web\View */
/* @var $model app\models\Transporte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'licencia_conducir')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'placa_vehiculo')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'id_turno')->dropDownList(
    		ArrayHelper::map(Turno::find()->all(), 'id_turno', 'nombre'),
            ['prompt'=>'Selecionar Turno']
        ) ?>

    <?= $form->field($model, 'id_local')->dropDownList(
    		ArrayHelper::map(Local::find()->all(), 'id_local', 'nombre'),
            ['prompt'=>'Selecionar Local']
        ) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
