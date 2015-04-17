<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sunat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
