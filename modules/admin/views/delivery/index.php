<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\DeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Deliveries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Delivery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_delivery',
            'destino_latitud',
            'destino_longitud',
            'telefono',
            'status',
            // 'id_usuario',
            // 'id_local',
            // 'paso',
            // 'justificacion_cancelado:ntext',
            // 'costo_envio',
            // 'id_transporte',
            // 'tipo_comprobante',
            // 'id_empresa',
            // 'nombre_receptor',
            // 'dni_receptor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
