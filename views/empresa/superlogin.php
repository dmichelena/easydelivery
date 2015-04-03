<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
   	<div class="col-md-6" style="text-align:center">
   		<h1>¿Tienes cuenta?</h1>
   		<div class="site-login" style="text-align:left">		
		    <?php $form = ActiveForm::begin(); ?>
		
		    <?= $form->field($modelLogin, 'username') ?>
		
		    <?= $form->field($modelLogin, 'password')->passwordInput() ?>
				
		    <div class="form-group">
		        <div class="col-lg-offset-1 col-lg-11">
		            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		        </div>
		    </div>
		
		    <?php ActiveForm::end(); ?>
		</div>
   	</div>
   	<div class="col-md-6" style="text-align:center">
   		<h1>Usuario nuevo</h1>
   		<div style="text-align:left">
	   		<?= $this->render('_form', [
	        	'model' => $model,
	   			'modelLogin' => $modelLogin,
	    	]) ?>
    	</div>
   	</div>
</div>