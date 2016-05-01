<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ASIGNACION') ?>

    <?= $form->field($model, 'ID_ESTADO_SOLICITUD') ?>

    <?= $form->field($model, 'DOCENTE_ASIGNACION') ?>

    <?= $form->field($model, 'ASIGNATURA_ASIGNACION') ?>

    <?= $form->field($model, 'SECCION_ASIGNACION') ?>

    <?php // echo $form->field($model, 'CAPACIDAD_ASIGNACION') ?>

    <?php // echo $form->field($model, 'TIPO_SALA_ASIGNACION') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
