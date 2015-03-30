<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'descipcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'precio_envio')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <?= $form->field($model, 'id_local')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
