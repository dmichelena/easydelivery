<div class="col-lg-9 col-md-9 col-xs-6">
    <h2>Mis Pedidos</h2>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td><strong>Número de Pedido</strong></td>
                <td><?= $model[0]['id_delivery']?></td>
            </tr>
            <tr>
                <td><strong>Fecha Pedido</strong></td>
                <td><?= $model[0]['fecha_pedido'] ?></td>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>
                <td><?= $model[0]['nombre_receptor'] ?></td>
            </tr>
            <tr>
                <td><strong>Teléfono</strong></td>
                <td><?=$model[0]['telefono'] ?></td>
            </tr>
            <tr>
                <td><strong>Tiempo de Entrega (aprox)</strong></td>
                <td>45 min</td>
            </tr>
            </tbody>
        </table>
    </div>
    <br />
    <br />

    <div class="col-lg-12 col-md-12 col-xs-12">
        <table class="table table-condensed table-hover">
            <thead>
            <tr class="active">
                <th>Detalle</th>
                <th>Precio unidad</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($model as $m):
                ?>
                <tr>
                    <td><?= $m['nombre'] ?></td>
                    <td>S/. <?= $m['precio_unitario'] ?></td>
                    <td><?= $m['cantidad'] ?></td>
                    <td>S/. <?= $m['cantidad'] * $m['precio_unitario'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>
        <br />
        <br />
    </div>
</div>