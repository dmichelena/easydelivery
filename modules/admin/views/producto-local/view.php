<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoLocal */

$this->title = $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Producto Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-local-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local], [
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
            'id_producto',
            'id_local',
            'stock',
            'precio',
            'status',
        ],
    ]) ?>

</div>
