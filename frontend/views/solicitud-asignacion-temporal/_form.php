<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-temporal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'SALA_ASIGNACION_TEMPORAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION_TEMPORAL')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
