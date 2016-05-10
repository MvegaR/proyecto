<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cambio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTADO_CAMBIO')->textInput() ?>

    <?= $form->field($model, 'ASIGNATURA_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SECCION_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DOCENTE_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAPACIDAD_CAMBIO')->textInput() ?>
	
	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
