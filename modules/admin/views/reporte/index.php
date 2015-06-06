<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <h2>REPORTES</h2>
        </div>
        <div class="col-md-12">

            <div class="col-md-11">


                <hr />
                <div class="row">
                    <div style="text-align: center">
                        <h2>Productos mas vendidos</h2><br />
                    </div>
                    <div class="col-lg-4 col-xs-12"></div>
                    <br />
                    <br />

                    <div>
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr class="active">
                                <th>idProducto</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($productoVendido as $pv): ?>
                                <tr>
                                    <td><?= $pv['id_producto'] ?></td>
                                    <td><?= $pv['nombre'] ?></td>
                                    <td><?= $pv['vendido'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                    <br />
                    <br />
                </div>

                <hr />
                <div class="row">
                    <div style="text-align: center">
                        <h2>Tiempo promedio de Entrega</h2><br />
                    </div>
                    <br />
                    <br />
                    <div>
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr class="active">
                                <th>Pedidos a Tiempo</th>
                                <th>Pedidos Retrasados</th>
                                <th>Pedidos Cancelados</th>
                                <th>Total</th>
                                <th>Tiempo promedio entrega</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>50</td>
                                <td>1</td>
                                <td>3</td>
                                <td>54</td>
                                <td>25 min</td>
                            </tr>

                            </tbody>
                        </table>
                        <br />
                        <br />
                    </div>

                </div>

                <hr />
                <div class="row">
                    <div style="text-align: center">
                        <h2>Clientes frecuentes</h2><br />
                    </div>
                    <br />
                    <br />

                    <div>
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr class="active">
                                <th>DNI</th>
                                <th>Cliente</th>
                                <th>Cantidad Compras</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($clientesFrecuentes as $cf):
                            ?>
                            <tr>
                                <td><?= $cf['dni_receptor'] ?></td>
                                <td><?= $cf['nombre_receptor'] ?></td>
                                <td><?= $cf['COUNT(*)'] ?></td>
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
                <hr />
                <div class="row">
                    <div style="text-align: center">
                        <h2>Zonas Comunes</h2><br />
                    </div>
                    <div class="col-lg-12 col-xs-12">
                        <div id="map-canvas" style="width:100%;height: 300px;"></div>
                    </div>
                    <br />
                    <br />
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Producto');
        data.addColumn('number', 'Cantidas');
        data.addRows([
            <?php foreach($productoVendido as $pv): ?>
                ['<?= $pv['nombre'] ?>', <?= $pv['vendido'] ?>],
            <?php endforeach; ?>
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
            'width':400,
            'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
