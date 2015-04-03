<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresa;
use yii\helpers\ArrayHelper;
use app\models\Turno;

/* @var $this yii\web\View */
/* @var $model app\models\Local */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="local-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'latitud')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'longitud')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'zona_reparto_km')->textInput() ?>

    <?= $form->field($model, 'id_turno')->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id_turno', 'nombre'), ['prompt' => 'Seleccione una turno']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label('') ?>
    
    <?php 
    	$empresa = Empresa::find()->where('id_user=:id_user',[':id_user' => Yii::$app->user->identity->id])->one();
    ?>
    <?= $form->field($model, 'id_empresa')->hiddenInput(['value'=> $empresa['id_empresa']])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
