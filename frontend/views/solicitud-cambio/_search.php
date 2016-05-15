<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cambio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_CAMBIO') ?>

    <?= $form->field($model, 'ID_ESTADO_CAMBIO') ?>

    <?= $form->field($model, 'ASIGNATURA_CAMBIO') ?>

    <?= $form->field($model, 'SECCION_CAMBIO') ?>

    <?= $form->field($model, 'SALA_CAMBIO') ?>

    <?php  echo $form->field($model, 'DOCENTE_CAMBIO') ?>

    <?php  echo $form->field($model, 'CAPACIDAD_CAMBIO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
