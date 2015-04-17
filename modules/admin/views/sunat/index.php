<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SunatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sunats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sunat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sunat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empresa',
            'ruc',
            'razon_social',
            'direccion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
