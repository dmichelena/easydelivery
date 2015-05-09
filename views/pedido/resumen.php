<form class="form-horizontal">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <font size="+2"><span class="glyphicon glyphicon-shopping-cart">Descripción del Pedido</span></font>
        </div></br>
    </div>
    <div class="row clearfix">
        <div class="col-md-6 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <?php foreach($pedido as  $cantidad => $p):?>
                    <div class="row clearfix">
                        <div class="col-md-4 column">
                            <img src="<?= $p->foto ?>" class="img-rounded" />
                        </div>
                        <div class="col-md-4 column">
                            <div class="form-group">
                                <label class="control-label" style="color: #FFBD32"><u><?= $p->nombre ?></u></label>
                                <label class="control-label"><?= $p->descripcion ?></label><br/>
                                <label class="control-label">S/<?= $p->precio ?></label>
                            </div>

                        </div>
                        <div class="col-md-4 column"></br></br>
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon1">Cantidad</span>
                                <input type="number" min="1" class="form-control" aria-describedby="sizing-addon1" value="<?= $cantidad ?>" />

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <div class="col-md-6 column" >
            <div style="text-align: center">
                <label>Direccion: Av. Aviacion 3351 Dpt.128 - San Borja, Lima</label><br />
                <label style="color: #3E7FB7">Tiempo Máximo de Pedido: 45 Minutos</label>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">D.N.I:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" placeholder="Numero de D.N.I">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Recibe la Orden:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" disabled placeholder="Maylin Marchan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Teléfono:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ejemplo: 958478123">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">RUC:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ejemplo: 19875487542">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Sub Total:</label>
                <div class="col-sm-9">
                    <label class="control-label">S/88.00</label>
                </div>


                <label class="col-sm-3 control-label">Costo de Envío:</label>
                <div class="col-sm-9">
                    <label class="control-label">S/. 0.00</label>
                </div>


                <label class="col-sm-3 control-label" style="color: #E45863">Monto Total:</label>
                <div class="col-sm-9">
                    <label class="control-label" style="color: #E45863">S/88.00</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Comprobante:</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="Comprobante" value="1"> Factura
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Comprobante" value="2"> Boleta
                    </label>
                </div>


            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" >
                    <button type="submit" class="btn btn-primary">Confirmar Compra</button>
                </div>
            </div>

        </div>

    </div> <br></br><br></br>
</form>