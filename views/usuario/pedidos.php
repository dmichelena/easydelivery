<div class="col-md-12 column">
    <font size="+3"><span class="glyphicon glyphicon-shopping-cart">Mis Pedidos</span></font>
</div>
<div class="row clearfix">
    <div class="col-md-12 column">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr class="active">
                    <th>N° Producto</th>
                    <th>Fecha</th>
                    <th>Tiempo Aproximado de Entrega</th>
                    <th>Detalle</th>
                    <th>Estado</th>
                    <th>Seguimiento</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($model as $m):
                ?>
                <tr>
                    <td><?= $m['id_delivery'] ?></td>
                    <td><?= $m['fecha_pedido'] ?></td>
                    <td><?= date("Y-m-d H:i:s", strtotime($m['fecha_pedido']) + 45* 60);  ?></td>
                    <td> <button type="button" class="btn btn-primary">Ver Detalle</button> </td>
                    <td>En Camino</td>
                    <td><button type="button" class="btn btn-primary">Ver</button></td>
                </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="row clearfix"></div>
        <div class="row" ></div>

        <div class="row clearfix"></div>
    </div>
</div>