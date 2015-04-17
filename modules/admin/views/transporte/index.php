<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TransporteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporte-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_transporte',
            'nombre',
            'apellido_p',
            'apellido_m',
            'domicilio',
            // 'telefono',
            // 'licencia_conducir',
            // 'placa_vehiculo',
            // 'id_turno',
            // 'id_local',
            // 'status',
            // 'longitud',
            // 'latitud',
            // 'usuario',
            // 'password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
