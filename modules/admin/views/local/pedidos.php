<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="productos-form">
    <h1>
        Pedidos delivery
    </h1>
    <?php $form = ActiveForm::begin(); ?>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Pedido</th>
            <th>Fecha</th>
            <th>Contacto</th>
            <th>Receptor</th>
            <th>Estado</th>
            <th>Agente</th>
            <th>Seguimiento</th>
        </tr>
        <?php
        foreach($delivery as $d):
            ?>
            <tr>
                <td><?= Html::encode($d['id_delivery'])?></td>
                <td><?= Html::encode($d['fecha_pedido'])?></td>
                <td><?= Html::encode($d['telefono'])?></td>
                <td><?= Html::encode($d['nombre_receptor'])?></td>
                <td><?= Html::encode($d['paso'])?></td>
                <td><?= Html::encode($d['nombre'].' '.$d['apellido_p'].' '.$d['apellido_m'])?></td>
                <td><a href="/admin/local/seguimiento?id_transporte=<?= $d['id_transporte'] ?>" class="btn btn-primary">Ver en Mapa</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="form-group">
        <?= Html::submitButton('guardar' ,['class' =>'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
