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
                <td>$model[0]['telefono'] ?></td>
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
            <tr>
                <td>Megatrío</td>
                <td>S/. 39.00</td>
                <td>1</td>
                <td>S/. 39.00</td>
            </tr>
            <tr>
                <td>Mega Famiiar</td>
                <td>S/. 49.00</td>
                <td>1</td>
                <td>S/. 49.00</td>
            </tr>
            <tr>
                <td>Costo de envío</td>
                <td></td>
                <td></td>
                <td>S/. 0.00</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td><strong>S/. 88.00</strong></td>
            </tr>
            </tbody>
        </table>
        <br />
        <br />
    </div>
</div>