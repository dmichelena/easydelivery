<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rubro */

$this->title = 'Update Rubro: ' . ' ' . $model->id_rubro;
$this->params['breadcrumbs'][] = ['label' => 'Rubros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rubro, 'url' => ['view', 'id' => $model->id_rubro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rubro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
