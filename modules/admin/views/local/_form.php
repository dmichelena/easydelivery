<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Local */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="local-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => 13]) ?>
    
    <div class="control-label col-md-2">Seleccione su local en el mapa</div><div class="col-md-10"><div id="map_canvas" style="width:100%; height:400px"></div></div>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => 13, 'class' => 'latitud']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15, 'class' => 'longitud']) ?>

    <?= $form->field($model, 'zona_reparto_km')->textInput() ?>

    <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map(\app\models\Turno::find()->all(), 'id_turno', 'nombre'), ['prompt' => 'Seleccione un turno']) ?>

    <?= $form->field($model, 'costo_envio')->textInput() ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <?= $form->field($model, 'id_empresa')->hiddenInput(['value' => $session->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
