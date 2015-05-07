<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/**
 * Created by PhpStorm.
 * User: sebas_burgos
 * Date: 07/05/2015
 * Time: 1:48
 */
?>
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