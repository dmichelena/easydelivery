<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = 'Update Pedido: ' . ' ' . $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local, 'id_delivery' => $model->id_delivery]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
