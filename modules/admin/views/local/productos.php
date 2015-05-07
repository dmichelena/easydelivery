<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        foreach($model as $m):
        echo "<pre>";print_r($m);die();
    ?>
            <?php
                Html::checkbox("[".$m->id_producto."]producto");
            ?>
    <?php endforeach; ?>

    <?php ActiveForm::end(); ?>
