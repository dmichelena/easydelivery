<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="local-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Local', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_local',
            'nombre',
            'direccion',
            //'latitud',
            //'longitud',
             'telefono',
             'zona_reparto_km',
            // 'id_empresa',
            // 'id_turno',
            // 'status',
            // 'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
