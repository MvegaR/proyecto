<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTADO_SOLICITUD')->textInput() ?>

    <?= $form->field($model, 'DOCENTE_ASIGNACION')->textInput(['maxlength' => true]) //roles?> 

    <?= $form->field($model, 'ASIGNATURA_ASIGNACION')->textInput(['maxlength' => true]) // asignatura del user?>

    <?= $form->field($model, 'SECCION_ASIGNACION')->textInput(['maxlength' => true]) // seccion del user ?>

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION')->textInput() ?>

    <?= $form->field($model, 'TIPO_SALA_ASIGNACION')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
