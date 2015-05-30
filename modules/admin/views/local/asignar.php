<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="productos-form">
    <h1>
       Asignar Pedidos
    </h1>
    <?php
    if($grabo):
    ?>
        <h5>
            Se asignaron correctamente los pedidos
        </h5>
     <?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Pedido</th>
            <th>Fecha</th>
            <th>Contacto</th>
            <th>Receptor</th>
            <th>Agente</th>
        </tr>
        <?php
        foreach($delivery as $d):
            ?>
            <tr>
                <td><?= Html::encode($d['id_delivery'])?></td>
                <td><?= Html::encode($d['fecha_pedido'])?></td>
                <td><?= Html::encode($d['telefono'])?></td>
                <td><?= Html::encode($d['nombre_receptor'])?></td>
                <td><?= $form->field($d, "[".$d->id_delivery."]id_transporte")->dropDownList($transporte, ['prompt' => 'Seleccione un motorizado']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="form-group">
        <?= Html::submitButton('guardar' ,['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
