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

    
    <table>
    	<tr>
    		<th>Producto</th>
    		<th>Precio</th>
    		<th>Stock</th>
    	</tr>
    <?php
        foreach($model as $m):
    ?>
    	<tr>
            <td><?= $form->field($m, "[".$m->id_producto."]id_producto")->checkbox(['label' => $m->nombre, 'checked' => false])?></td>
            
            <td><?= $form->field($m, "[".$m->id_producto."]precio")->textInput()->label(false)?></td>
            
            <td><?= $form->field($m, "[".$m->id_producto."]stock")->textInput()->label(false)?></td>
        </tr>
    <?php endforeach; ?>
    </table>

    <?php ActiveForm::end(); ?>
