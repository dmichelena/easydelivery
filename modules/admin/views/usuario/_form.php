<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido_p')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido_m')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => 8]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
