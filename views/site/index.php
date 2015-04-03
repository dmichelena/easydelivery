<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>EasyDelivery</h1>

        <p class="lead">Pide. Trackea. Paga.</p>
    </div>
    
<?php 
if(!isset(Yii::$app->user->identity->id))
{
?>
    <div class="row">
    	<div class="col-md-6" style="text-align:center">
    		Pedir Delivery
    	</div>
    	<div class="col-md-6" style="text-align:center">
    		<a href="/empresa/superlogin">
    			Empresas
    		</a>
    	</div>
    </div>
<?php 
}else{
?>
	<div class="row">
		<h1>Bienvenido <?= Yii::$app->user->identity->username ?></h1>
	</div>
<?php }?>
</div>
