<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Rubro;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 100]) ?>
    
    <?= $form->field($model, 'usuario')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 45]) ?>
    
    <?= $form->field($model, 'foto')->fileInput() ?>
    
    <?= $form->field($model, 'id_rubro')->dropDownList(ArrayHelper::map(Rubro::find()->all(), 'id_rubro', 'nombre'), ['prompt' => 'Seleccione un rubro']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
