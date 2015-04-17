<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = $model->id_delivery;
$this->params['breadcrumbs'][] = ['label' => 'Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_delivery], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_delivery], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_delivery',
            'destino_latitud',
            'destino_longitud',
            'telefono',
            'status',
            'id_usuario',
            'id_local',
            'paso',
            'justificacion_cancelado:ntext',
            'costo_envio',
            'id_transporte',
            'tipo_comprobante',
            'id_empresa',
            'nombre_receptor',
            'dni_receptor',
        ],
    ]) ?>

</div>
