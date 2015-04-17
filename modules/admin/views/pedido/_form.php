<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto')->textInput() ?>

    <?= $form->field($model, 'id_local')->textInput() ?>

    <?= $form->field($model, 'id_delivery')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
