<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rubro;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => 20]) ?>
    
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 100])->label('Razón Social') ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'id_rubro')->dropDownList(ArrayHelper::map(Rubro::find()->all(), 'id_rubro', 'nombre'), ['prompt' => 'Seleccione un rubro']) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=> 'activo'])->label('') ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=> '1'])->label('') ?>
		
    <?= $form->field($modelLogin, 'username') ?>
	<?= $form->field($modelLogin, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
