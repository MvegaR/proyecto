<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cancelacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTADO_CANCELACION')->textInput() ?>

    <?= $form->field($model, 'DOCENTE_CANCELACION')->textInput(['maxlength' => true]) //user?>

    <?= $form->field($model, 'ASIGNATURA_CANCELACION')->textInput(['maxlength' => true]) //user?>

    <?= $form->field($model, 'SECCION_CANCELACION')->textInput(['maxlength' => true]) //user?>

    <?= $form->field($model, 'BLOQUE_CANCELACION')->textInput() ?>

    <?= $form->field($model, 'MOTIVO')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
