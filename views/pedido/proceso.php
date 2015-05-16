<?php
use yii\widgets\ActiveForm;
?>
<section class="row">
	<div class="col-lg-12">
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

				<label>Sub-Total: </label>
				<label>S/. <span class="sub-total">0</span> </label>
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
                <label class="control-label"><strong>Categoria</strong> <?= $p['categoria'] ?></label>
			</div>
			<div class="col-lg-4">
				<div class="input-group input-group-sm">
					<span class="input-group-addon" id="sizing-addon1">Cantidad</span>
                    <select name="cantidad[<?=$p['id_producto']?>]" class="form-control cantidaad" valor="<?=$p['precio']?>" valor-total="0">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
				</div></br>
				<div class="input-group input-group-sm">
					<span class="input-group-addon" id="sizing-addon1">Precio Unitario</span>
					<input type="number" min="1" class="form-control" aria-describedby="sizing-addon1" value="<?=$p['precio']?>" disabled="disabled" />
				</div></br>
			</div>
		</div>
		<hr/>
		<?php endforeach;?>
        <button type="submit" class="btn btn-lg btn-warning" >Comprar</button>
		<?php ActiveForm::end(); ?>
	</div>	
</section>