<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-temporal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'SOLICITUD_TEMPORAL_PADRE') ?>

    <?= $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'SALA_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'FECHA_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'TIPO_SALA_ASIGNACION_TEMPORAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
