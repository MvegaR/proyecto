<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cancelacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_CANCELACION') ?>

    <?= $form->field($model, 'ID_ESTADO_CANCELACION') ?>

    <?= $form->field($model, 'DOCENTE_CANCELACION') ?>

    <?= $form->field($model, 'ASIGNATURA_CANCELACION') ?>

    <?= $form->field($model, 'SECCION_CANCELACION') ?>

    <?php // echo $form->field($model, 'BLOQUE_CANCELACION') ?>

    <?php // echo $form->field($model, 'MOTIVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
