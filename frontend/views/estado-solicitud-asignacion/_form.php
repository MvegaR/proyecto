<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-solicitud-asignacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE_ESTADO')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre de estado de solicitud"]) ?>

	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
