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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'descipcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'precio_unitario')->textInput() ?>

    <?= $form->field($model, 'precio_envio')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id_categoria', 'nombre'), ['prompt' => 'Seleccione una categoria']) ?>

    <?= $form->field($model, 'id_local')->dropDownList(ArrayHelper::map(Local::find()->where('id_user=:id_user',[':id_user' => Yii::$app->user->identity->id])->all(), 'id_local', 'nombre'), ['prompt' => 'Seleccione un local']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'activo' => 'Activo', 'inactivo' => 'Inactivo', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
