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

    <?php $form = ActiveForm::begin([
    		'options' => ['class' => 'form-horizontal'],
    		'fieldConfig' => [
    			'template' => "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
    		],
    ]); ?>

    <?= $form->field($model, 'nombre', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'dni', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'domicilio', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'telefono', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'licencia_conducir', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'placa_vehiculo', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'id_turno', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList(ArrayHelper::map(Turno::find()->all(), 'id_turno', 'nombre'), ['prompt' => 'Seleccione un turno']) ?>

    <?= $form->field($model, 'id_local', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList(ArrayHelper::map(Local::find()->where('id_user=:id_user',[':id_user' => Yii::$app->user->identity->id])->all(), 'id_local', 'nombre'),['prompt' => 'Seleccione un local']) ?>

    <?= $form->field($model, 'status', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <?= $form->field($model, 'id_user', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['value'=> Yii::$app->user->identity->id])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
