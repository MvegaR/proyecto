<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Sala;
use frontend\models\TipoSala;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-temporal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord ) echo $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL')->hiddenInput(['value' => 3])->label(false); ?>

    <?php if($model->isNewRecord) echo $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL')->hiddenInput(['value' => Yii::$app->user->identity -> ID_DOCENTE])->label(false); ?>
        
    <?= $form->field($model, 'CAPACIDAD_ASIGNACION_TEMPORAL')->textInput(['type' => 'number', 'min' => 1]) ?>

    <?= $form->field($model, 'TIPO_SALA_ASIGNACION_TEMPORAL')->dropDownList(ArrayHelper::map(TipoSala::find() -> all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
    ['prompt' => 'Seleccione tipo sala', 'onchange' => '$.post(
        "index.php?r=sala/listscaptipo&tipo='.'"+$(this).val()+"&cap='.'"+$("input#solicitudasignaciontemporal-capacidad_asignacion_temporal").val()
    , function(data){
             $("select#solicitudasignaciontemporal-sala_asignacion_temporal").html(data);
        });']) ?>

    <?php 
    $fecha = (new DateTime()) -> format('Y-m-d');
    $mesmax  = mktime(0, 0, 0, date("m")+1, date("d"), date("Y"));
    $fechamax = date('Y-m-d', $mesmax);
    ?>

    <?= $form->field($model, 'SALA_ASIGNACION_TEMPORAL')->dropDownList([], ['prompt' => 'Seleccione una sala.']) ?>

    <?= $form->field($model, 'FECHA_ASIGNACION_TEMPORAL')->textInput(['type' => 'date', 'min' => "$fecha", 'max' => "$fechamax"]) ?>

    <p class="help-block">Solo puede solicitar salas temporales con un mes de anticipación, se impedirá envíar el formulario.</p>

    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL')->textInput() ?>

    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION_TEMPORAL')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
