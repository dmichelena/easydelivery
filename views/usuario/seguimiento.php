
<?php

use yii\helpers\Html;

?><div class="col-md-12 column">
    <font size="+3"><span class="glyphicon glyphicon-shopping-cart">Seguimiento</span></font>
</div>
<div class="row clearfix">
    <div class="col-md-12 column">
        <h5><strong>Pedido N: </strong><?= Html::encode($pedido['id_delivery']) ?></h5>
        <h5><strong>Motorizado: </strong><?= Html::encode($pedido['nombre'].' '.$pedido['apellido_p'].' '.$pedido['apellido_m']) ?></h5>

        <div id="map_canvas2" style="width:100%; height:400px"></div>
    </div>
    <div class="row">
        <div class="row clearfix"></div>
        <div class="row" ></div>

        <div class="row clearfix"></div>
    </div>
</div>
<script>
    var longitud=<?= $pedido['longitud']?>;
    var latitud=<?= $pedido['latitud']?>;
    var id_delivery=<?= $pedido['id_delivery']?>;
</script>