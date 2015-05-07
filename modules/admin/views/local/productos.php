<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="productos-form">
<h1>
	Selecciona los productos para tu tienda
</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?php
        foreach($model as $m):
    ?>
            <?= $form->field($m, "[".$m->id_producto."]id_producto")->checkbox(['label' => $m->nombre, 'checked' => false])?>
            
            <?= $form->field($m, "[".$m->id_producto."]precio")->textInput()->label("Precio")?>
            
            <?= $form->field($m, "[".$m->id_producto."]stock")->textInput()->label("Stock")?>
    <?php endforeach; ?>

    <?php ActiveForm::end(); ?>
