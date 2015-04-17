<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;
use app\models\Empresa;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'descipcion')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id_categoria', 'nombre'), ['prompt' => 'Seleccione una categoria']) ?> 

    <?= $form->field($model, 'id_empresa')->dropDownList(ArrayHelper::map(Empresa::find()->all(), 'id_empresa', 'nombre'), ['prompt' => 'Seleccione una empresa']) ?>
    
    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
