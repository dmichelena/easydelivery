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

    <?php $form = ActiveForm::begin([
    		'options' => ['class' => 'form-horizontal'],
    		'fieldConfig' => [
    			'template' => "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
    		],
    ]); ?>

    <?= $form->field($model, 'nombre', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'direccion', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 100]) ?>
    
    <div id="map_canvas" style="width:400px; height:400px"></div>

    <?= $form->field($model, 'telefono', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'zona_reparto_km', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput() ?>

    <?= $form->field($model, 'id_turno', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id_turno', 'nombre'), ['prompt' => 'Seleccione una turno']) ?>

    <?= $form->field($model, 'status', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_user', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['value'=> Yii::$app->user->identity->id])->label('') ?>
    
    <?= $form->field($model, 'latitud', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['class' => 'latitud'])->label('') ?>
    
    <?= $form->field($model, 'longitud', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['class' => 'longitud'])->label('') ?>
    
    <?php 
    	$empresa = Empresa::find()->where('id_user=:id_user',[':id_user' => Yii::$app->user->identity->id])->one();
    ?>
    <?= $form->field($model, 'id_empresa')->hiddenInput(['value'=> $empresa['id_empresa']])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
