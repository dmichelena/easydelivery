<section class="row">
            <div class="col-lg-3">
                <div class="list-group">
                	<?php 
                		foreach($categoria as $c):
                	?>
                    <a href="#" class="list-group-item "><?=$c['nombre'] ?></a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                	<center>
                    <div class="col-lg-4 col-xs-3 col-md-3">
                        <img src="http://upload.wikimedia.org/wikipedia/en/thumb/b/bf/KFC_logo.svg/1024px-KFC_logo.svg.png" height="80" width="80" /> <h2>KFC</h2>
                    </div>
                    </center>
                    <div class="col-lg-4 col-xs-4 col-md-4">
                        <h2></h2>
                    </div>
                    <div class="col-lg-4 col-xs-5 col-md-5" ></br>
                        <button class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>Carrito de Compra</button><br />
                        <label>Sub-Total: </label>
                        <label>S/. 0.00 </label>
                    </div>
                </div>
                <?php 
                	foreach($producto as $p):
                ?>
                <hr/>
                <div class="row">
                    <div class="col-lg-4">
                        <img alt="140x140" src="<?= $p['foto']?>" class="img-rounded" />
                    </div>
                    <div class="col-lg-4">
                        
                            <label style="color: #FFBD32"><u><?= $p['nombre'] ?></u></label>
                            <label class="control-label"><?= $p['descripcion']?></label>
                    </div>
                    <div class="col-lg-4">
                        <form class=" form-inline">
                            <div class="input-group input-group-sm">
                            <span class="input-group-addon" id="sizing-addon1">Cantidad</span>
                            <input type="number" min="1" class="form-control" aria-describedby="sizing-addon1" value="1" />
                        </div></br>
                        <button type="button" class="btn btn-lg btn-warning" >Comprar</button>
                        </form>
                    </div>
                </div>
                <hr/>
                <?php endforeach;?>
            </div>	
            
        </section>