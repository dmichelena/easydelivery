<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Local */

$this->title = $model->id_local;
$this->params['breadcrumbs'][] = ['label' => 'Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_local], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_local], [
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
            'id_local',
            'nombre',
            'direccion',
            'latitud',
            'longitud',
            'telefono',
            'zona_reparto_km',
            'id_empresa',
            'id_turno',
            'status',
            'costo_envio',
            'usuario',
            'password',
        ],
    ]) ?>

</div>
