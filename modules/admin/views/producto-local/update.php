<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoLocal */

$this->title = 'Update Producto Local: ' . ' ' . $model->id_producto;
$this->params['breadcrumbs'][] = ['label' => 'Producto Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id_producto' => $model->id_producto, 'id_local' => $model->id_local]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="producto-local-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
