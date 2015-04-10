<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categoria;
use yii\helpers\ArrayHelper;
use app\models\Local;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin([
    		'options' => ['class' => 'form-horizontal'],
    		'fieldConfig' => [
    			'template' => "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
    		],
    ]); ?>

    <?= $form->field($model, 'nombre', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'foto', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'descipcion', ['labelOptions'=>['class'=>'control-label col-md-2']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stock', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput() ?>

    <?= $form->field($model, 'precio_unitario', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput() ?>

    <?= $form->field($model, 'precio_envio', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput() ?>

    <?= $form->field($model, 'id_categoria', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id_categoria', 'nombre'), ['prompt' => 'Seleccione una categoria']) ?>

    <?= $form->field($model, 'id_local', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList(ArrayHelper::map(Local::find()->where('id_user=:id_user',[':id_user' => Yii::$app->user->identity->id])->all(), 'id_local', 'nombre'), ['prompt' => 'Seleccione un local']) ?>

    <?= $form->field($model, 'status', ['labelOptions'=>['class'=>'control-label col-md-2']])->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_user', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['value'=> Yii::$app->user->identity->id])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
