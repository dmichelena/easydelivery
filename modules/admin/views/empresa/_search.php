<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?= $form->field($model, 'razon_social') ?>

    <?= $form->field($model, 'ruc') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'id_rubro') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'password') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
