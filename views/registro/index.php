<?php
use yii\bootstrap\ActiveForm;
?>
		<section class="row">
            <div class="col-md-11">
                <div class="row">
                	<center>
                    <div class="col-lg-4 col-xs-5 col-md-3">
                         <h4>"Es importante saber donde te ubicas para llevarte tus compras"</h4>
                    </div>
                    </center>
                    <div class="col-lg-4 col-xs-2 col-md-4">
                        <h2></h2>
                    </div>
                    <div class="col-lg-4 col-xs-5 col-md-5" ></br>
                        <a href="/usuario/pedidos" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>Mis Pedido</a><br />
                        
                    </div>
                </div>
                <hr/>
                <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="col-lg-4 col-xs-12">
                        * Añade Tu dirección: <input type="text" name="direccion" size="60%" value="<?= $model['direccion'] ?>">
                    </div>
                   <br />
				   <br />
				   <br />
				   <div class="col-lg-4 col-xs-12">
                        * Ubicar Posición:
                    </div>
                        
                    
                        <div id="map_canvas" style="width:100%; height:400px"></div>
                        <input type="hidden" name="latitud" class="latitud" />
                        <input type="hidden" name="longitud" class="longitud" />
						<br />
						<br />
                    <button type="submit"  class="btn btn-primary">Guardar Ubicación</button>
                   
                   <?php ActiveForm::end(); ?>
                </div>
                <hr/>
            </div>	
            
        </section>