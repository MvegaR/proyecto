<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacionTemporalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-solicitud-asignacion-temporal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL') ?>

    <?= $form->field($model, 'NOMBRE_ESTADO_ASIGNACION_TEMPORAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
