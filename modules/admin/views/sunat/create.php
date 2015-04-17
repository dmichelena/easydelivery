<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sunat */

$this->title = 'Create Sunat';
$this->params['breadcrumbs'][] = ['label' => 'Sunats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sunat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
