<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SunatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sunat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?= $form->field($model, 'ruc') ?>

    <?= $form->field($model, 'razon_social') ?>

    <?= $form->field($model, 'direccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
