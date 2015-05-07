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
            <?= $form->field($m, "[".$m->id_producto."]id_producto")->checkbox(['label' => $m->nombre, 'checked' => false])?>
    <?php endforeach; ?>

    <?php ActiveForm::end(); ?>
