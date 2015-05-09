<?php
use yii\widgets\ActiveForm;
?>
<section class="row">
	<div class="col-lg-3">
		<div class="list-group">
		<?php 
			foreach($categoria as $c):
		?>
			<a href="<?= \yii\helpers\Url::toRoute(['pedido/proceso', 'id' => $_GET['id'], 'id_categoria' => $c['id_categoria']]) ?>" class="list-group-item "><?=$c['nombre'] ?></a>
		<?php endforeach;?>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="row">
			<center>
				<div class="col-lg-4 col-xs-3 col-md-3">
					<img src="<?= $empresa->foto?>" height="80" width="80" /> <h2><?=$empresa->razon_social?></h2>
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
		<?php $form = ActiveForm::begin(); ?>
        <?php if(count($productos) == 0): ?>
        <div class="row">
            <h2 clas="btn-warning">No hay productos para esa categoría</h2>
        </div>
        <?php endif; ?>
		<?php 
			foreach($productos as $p):
		?>
		<hr/>
		<div class="row">
			<div class="col-lg-4">
				<img alt="140x140" src="<?= $p['foto']?>" class="img-rounded"  width="100" height="100" class="img-circle" />
			</div>
			<div class="col-lg-4">            
				<label style="color: #FFBD32"><u><?= $p['nombre'] ?></u></label>
				<label class="control-label"><?= $p['descipcion']?></label>
			</div>
			<div class="col-lg-4">
				<div class="input-group input-group-sm">
					<span class="input-group-addon" id="sizing-addon1">Cantidad</span>
					<input type="number" name="cantidad[<?=$p['id_producto']?>]" min="1" class="form-control" aria-describedby="sizing-addon1" value="0" />
				</div></br>
				<div class="input-group input-group-sm">
					<span class="input-group-addon" id="sizing-addon1">Precio Unitario</span>
					<input type="number" min="1" class="form-control" aria-describedby="sizing-addon1" value="<?=$p['precio']?>" disabled="disabled" />
				</div></br>
				<button type="submit" class="btn btn-lg btn-warning" >Comprar</button>
			</div>
		</div>
		<hr/>
		<?php endforeach;?>
		<?php ActiveForm::end(); ?>
	</div>	
</section>