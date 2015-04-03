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
    <title><?= Html::encode($this->title) ?></title>
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
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => '/site/index'],
                    ['label' => 'Empresas',
						'items' => [
							['label' => 'Empresas', 'url' => '/empresa'],
							['label' => 'Locales', 'url' => '/local'],
							['label' => 'Productos', 'url' => '/producto'],
            				['label' => 'Transporte', 'url' => '/transporte'],
            			]	 
					],
					['label' => 'Configuración',
						'items' => [
							['label' => 'Categoria', 'url' => '/categoria'],
							['label' => 'Rubro', 'url' => '/rubro'],
						]
					],
					['label' => 'Usuario', 'url' => '/usuario'],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => '/site/login'] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => '/site/logout',
                            'linkOptions' => ['data-method' => 'post']],
                ],
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
</body>
</html>
<?php $this->endPage() ?>
