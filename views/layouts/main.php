<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>EasyDelivery</title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'EasyDelivery',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);


        $session = \Yii::$app->session;

        if($session->has('usuario-webos'))
        {
            $menu = [
                ['label' => 'log out', 'url' => '/site/logout'],
            ];
        }
        else
        {
            $menu = [
                ['label' => 'login', 'url' => '/site/login'],
            ];
        }


          /*  echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => \app\component\MenuHelper::getMenu(),
            ]);*/
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menu,
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; EasyDelivery <?= date('Y') ?></p>
            <p class="pull-right"><a href="/admin/empresa/superlogin">¿Eres empresa?</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>
<script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDjzEmhSjvEf09A___LMxgDhm-fL0cWacA&sensor=TRUE"></script>
<script type="text/javascript" src="/js/map.js"></script>
<script type="text/javascript" src="/js/mapSeguimiento.js"></script>

<script type="text/javascript">

$("input[name=\"Comprobante\"]").click(function(){
	if($(this).val() == 1)
	{
		$(".empresa").show();
	}
	else
	{
		$(".empresa").hide();
	}
});

    $("select").change(function(){

        subTotal = ($(".sub-total").html()*1);
        valor = $(this).attr("valor");
        cant = $(this).val();
        valorTotal = $(this).attr("valor-total")*1;
        $(this).attr("valor-total", (cant*valor));

        subTotal = subTotal-valorTotal;
        subTotal = subTotal+(valor*cant);
        $(".sub-total").html(subTotal);
    });

    $(".buscar").click(function(){
        $.get("/pedido/dni?dni="+$(".dni").val(), function(data){
            data = JSON.parse(data);
            if(!data.status)
            {
                alert("No se encontró ese dni en el sistema");
            }
            else
            {
                $(".nombre").val(data.respuesta.nombres+" "+data.respuesta.apellido_paterno+" "+data.respuesta.apellido_materno);
            }
        });
    });

    $("[name=\"Usuario[dni]\"]").keyup(function(){
        $.get("/pedido/dni?dni="+$("[name=\"Usuario[dni]\"]").val(), function(data){
            data = JSON.parse(data);
            if(!data.status)
            {
                //alert("No se encontró ese dni en el sistema");
            }
            else
            {
                $("[name=\"Usuario[nombre]\"]").val(data.respuesta.nombres);
                $("[name=\"Usuario[apellido_p]\"]").val(data.respuesta.apellido_paterno);
                $("[name=\"Usuario[apellido_m]\"]").val(data.respuesta.apellido_materno);
                $("[name=\"Usuario[fecha_nacimiento]\"]").val(data.respuesta.fecha_nacimiento);
            }
        });
    });

document.onload = initializeMap();

</script>


</body>
</html>
<?php $this->endPage() ?>
