<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sunat */

$this->title = 'Update Sunat: ' . ' ' . $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Sunats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empresa, 'url' => ['view', 'id' => $model->id_empresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sunat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
