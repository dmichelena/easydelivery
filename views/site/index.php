<div class="col-md-8 column">
	<div class="carousel slide" id="carousel-796873" style="width: 675px; margin: 0 auto">
		<ol class="carousel-indicators">
			<li data-slide-to="0" data-target="#carousel-796873"></li>
            <li data-slide-to="1" data-target="#carousel-796873"></li>
            <li data-slide-to="2" data-target="#carousel-796873" class="active"></li>
        </ol>
		<div class="carousel-inner">
			<div class="item">
				<img alt="" src="img/electro1.jpg" height="318px" width="675px">
                <div class="carousel-caption">
					<h4>ELECTRODOMÉSTICOS</h4>
				</div>
			</div>
			<div class="item">
				<img alt="" src="img/licoreria1.jpg" height="318px" width="675px">
                <div class="carousel-caption">
					<h4>LICORERÍAS</h4>
				</div>
			</div>
			<div class="item active">
				<img alt="" src="img/kfcmega1.png" height="318px" width="675px">
                <div class="carousel-caption">
					<h4>
						FAST FOOD
					</h4>
				</div>
			</div>
		</div>
            <a class="left carousel-control" href="#carousel-796873" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-796873" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<div class="col-md-4 column">
    <div class="usuario-form">

        <?php $form = \yii\widgets\ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
            ],
        ]); ?>

        <?= $form->field($model, 'dni', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 8]) ?>

        <?= $form->field($model, 'nombre', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'apellido_p', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'apellido_m', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'password', ['labelOptions'=>['class'=>'control-label col-md-2']])->passwordInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'fecha_nacimiento', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput() ?>

        <?= $form->field($model, 'correo', ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['maxlength' => 45]) ?>

        <?= $form->field($model, 'status', ['labelOptions'=>['class'=>'control-label col-md-2']])->hiddenInput(['value' => 'activo']) ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>

    </div>
</div>
