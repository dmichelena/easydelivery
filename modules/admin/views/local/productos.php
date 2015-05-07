<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        foreach($model as $m):
    ?>
            <?= $form->field($m, "[".$m->id_producto."]Producto")->checkbox(['label' => $m->nombre])?>
    <?php endforeach; ?>

    <?php ActiveForm::end(); ?>
