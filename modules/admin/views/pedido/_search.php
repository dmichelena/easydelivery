<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_local') ?>

    <?= $form->field($model, 'id_delivery') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'precio_unitario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
