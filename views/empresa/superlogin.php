<div class="row">
   	<div class="col-md-6" style="text-align:center">
   		<h1>¿Tienes cuenta?</h1>
   	</div>
   	<div class="col-md-6" style="text-align:center">
   		<h1>Usuario nuevo</h1>
   		<div style="text-align:left">
	   		<?= $this->render('_form', [
	        	'model' => $model,
	    	]) ?>
    	</div>
   	</div>
</div>