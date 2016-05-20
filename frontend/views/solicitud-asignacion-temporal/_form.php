<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Sala;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-temporal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord ) echo $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL')->hiddenInput(['value' => 3])->label(false); ?>

    <?php if($model->isNewRecord) echo $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL')->hiddenInput(['value' => Yii::$app->user->identity -> ID_DOCENTE])->label(false); ?>
    <?= $form->field($model, 'CAPACIDAD_ASIGNACION_TEMPORAL')->textInput(['type' => 'number', 'min' => 1, 'onchange' => '$.post("index.php?r=sala/listscap&id='.'"+$(this).val(), function(data){
           $("select#solicitudasignaciontemporal-sala_asignacion_temporal").html(data);
       });']) ?>

    <?= $form->field($model, 'TIPO_SALA_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'SALA_ASIGNACION_TEMPORAL')->dropDownList(ArrayHelper::map(Sala:: find() -> all(), 'ID_SALA', 'ID_SALA'), ['prompt' => 'Seleccione una sala.']) ?>

    <?= $form->field($model, 'FECHA_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION_TEMPORAL')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
