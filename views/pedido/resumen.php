<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([ 'options' => ['class' => 'form-horizontal'],]); ?>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <font size="+2"><span class="glyphicon glyphicon-shopping-cart">Descripción del Pedido</span></font>
        </div></br>
    </div>
    <div class="row clearfix">
        <div class="col-md-6 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <?php
                    $precioTotal = 0;
                    foreach($pedido as  $cantidad => $p):
                        $precioTotal+=$cantidad*$p->precio;
                        ?>
                    <div class="row clearfix">
                        <div class="col-md-4 column">
                            <img src="<?= $p->foto ?>"  width="100" height="100" class="img-circle" />
                        </div>
                        <div class="col-md-4 column">
                            <div class="form-group">
                                <label class="control-label" style="color: #FFBD32"><u><?= $p->nombre ?></u></label>
                                <label class="control-label"><?= $p->descipcion ?></label><br/>
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
                <label style="color: #3E7FB7">Tiempo Máximo de Pedido: 45 Minutos</label>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">D.N.I:</label>
                <div class="col-sm-6">
                    <input type="text" name="dni" class="form-control dni" placeholder="Numero de D.N.I">
                </div>
                <div class="col-sm-3">
                    <input type="button" class="btn btn-warning buscar" value="Buscar" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Recibe la Orden:</label>
                <div class="col-sm-9">
                    <input type="text" name="nombres" class="form-control nombre" placeholder="Akiles Vailoyo">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Teléfono:</label>
                <div class="col-sm-9">
                    <input type="text" name="telefono" class="form-control" placeholder="Ejemplo: 958478123">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Sub Total:</label>
                <div class="col-sm-9">
                    <label class="control-label">S/<?= $precioTotal ?></label>
                </div>


                <label class="col-sm-3 control-label">Costo de Envío:</label>
                <div class="col-sm-9">
                    <label class="control-label">S/. <?php $envio = 10; echo $envio; ?></label>
                </div>


                <label class="col-sm-3 control-label" style="color: #E45863">Monto Total:</label>
                <div class="col-sm-9">
                    <label class="control-label" style="color: #E45863">S/<?= $precioTotal+$envio ?></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Comprobante:</label>
                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="Comprobante" class="comprobante" value="1"> Factura
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="Comprobante" class="comprobante" value="2"> Boleta
                    </label>
                </div>
            </div>
            
            <div class="form-group empresa">
                <label class="col-sm-3 control-label">RUC:</label>
                <div class="col-sm-9">
                    <input type="text" name="ruc" class="form-control" placeholder="Ejemplo: 19875487542">
                </div>
                <label class="col-sm-3 control-label">Razón social:</label>
                <div class="col-sm-9">
                    <input type="text" name="ruc" class="form-control" placeholder="Ejemplo: Empresa Cualquiera SAC">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" >
                    <button type="submit" class="btn btn-primary" data-confirm="¿Confirmas la compra?">Confirmar Compra</button>
                </div>
            </div>

        </div>

    </div> <br></br><br></br>
<?php ActiveForm::end(); ?>