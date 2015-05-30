<?php

use yii\helpers\Html;

?><div class="col-md-12 column">
    <font size="+3"><span class="glyphicon glyphicon-shopping-cart">Seguimiento</span></font>
</div>
<div class="row clearfix">
    <div class="col-md-12 column">
        <h5><strong>Motorizado: </strong><?= Html::encode($transporte['nombre'].' '.$transporte['apellido_p'].' '.$transporte['apellido_m']) ?></h5>

        <div id="map_canvas3" style="width:100%; height:400px"></div>
    </div>
    <div class="row">
        <div class="row clearfix"></div>
        <div class="row" ></div>

        <div class="row clearfix"></div>
    </div>
</div>
<script>
    var longitud=<?= $transporte['longitud']?>;
    var latitud=<?= $transporte['latitud']?>;
    var id_transporte=<?= $transporte['id_transporte']?>;
</script>

