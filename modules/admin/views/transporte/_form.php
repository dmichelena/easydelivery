<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Local;
use app\models\Turno;

/* @var $this yii\web\View */
/* @var $model app\models\Transporte */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido_p')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido_m')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'licencia_conducir')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'placa_vehiculo')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id_turno', 'nombre'), ['prompt' => 'Seleccione un turno']) ?>

    <?= $form->field($model, 'id_local')->dropDownList(ArrayHelper::map(Local::find()->where("id_empresa= :id_empresa",[':id_empresa'=>$session['admin']->id])->all(), 'id_local', 'nombre'), ['prompt' => 'Seleccione un local']) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => 13]) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => 13]) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
