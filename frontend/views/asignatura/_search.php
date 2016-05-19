<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AsignaturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ASIGNATURA') ?>

    <?= $form->field($model, 'ID_CARRERA') ?>

    <?= $form->field($model, 'NOMBRE_ASIGNATURA') ?>

    <?= $form->field($model, 'ANIO') ?>

    <?= $form->field($model, 'SEMESTRE') ?>

    <?php // echo $form->field($model, 'HORAS_TEO') ?>

    <?php // echo $form->field($model, 'HORAS_LAB_COM') ?>

    <?php // echo $form->field($model, 'HORAS_AYUDANTIA') ?>

    <?php // echo $form->field($model, 'HORAS_LAB_FISICA') ?>

    <?php // echo $form->field($model, 'HORAS_LAB_QUIMICA') ?>

    <?php // echo $form->field($model, 'HORAS_LAB_ROBOTICA') ?>

    <?php // echo $form->field($model, 'HORAS_LAB_MECANICA') ?>

    <?php // echo $form->field($model, 'HORAS_TALLER_ARQUITECTURA') ?>

    <?php // echo $form->field($model, 'HORAS_TALLER_MADERA') ?>

    <?php // echo $form->field($model, 'HORAS_GYM') ?>

    <?php // echo $form->field($model, 'HORAS_AUDITORIO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
