<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductoLocal */

$this->title = 'Create Producto Local';
$this->params['breadcrumbs'][] = ['label' => 'Producto Locals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-local-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
