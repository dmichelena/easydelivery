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



    $menu = [
        ['label' => 'Home', 'url' => '/site/index'],
    ];

    $session = \Yii::$app->session;
    if($session->has('admin'))
    {
        $menu = [
            ['label' => 'Home', 'url' => '/site/index'],
            ['label' => 'Locales', 'url' => '/admin/local'],
            ['label' => 'Productos', 'url' => '/admin/producto'],
            ['label' => 'Transporte', 'url' => '/admin/transporte'],
            ['label' => 'Logout (' . $session['admin']->razon_social . ')',
                'url' => '/admin/empresa/logout',
                'linkOptions' => ['data-method' => 'post']],
        ];
    }
    else
    {
        $menu[] = ['label' => 'Login', 'url' => '/admin/empresa/superlogin'];
    }

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
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDjzEmhSjvEf09A___LMxgDhm-fL0cWacA&sensor=TRUE"></script>
<script type="text/javascript" src="/js/map.js"></script>

<script type="text/javascript">
    document.onload = initializeMap();
</script>
</body>
</html>
<?php $this->endPage() ?>
