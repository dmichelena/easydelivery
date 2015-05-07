<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductoLocalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Producto Locals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-local-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Asignar productos', '/admin/local/productos', ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'id_producto',
				'value'		=> function($model){
            		$producto = $model->getIdProducto()->one();
            		return $producto['nombre'];
            	}
            ],
            [
				'attribute' => 'id_local',
				'value'		=> function($model){
            		$producto = $model->getIdLocal()->one();
            		return $producto['nombre'];
            	}
            ],
            'stock',
            'precio',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
