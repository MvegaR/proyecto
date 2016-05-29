<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Sala;
use frontend\models\TipoSala;
use frontend\models\EstadoAsignacionTemporal;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-temporal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    if($model->isNewRecord ) echo $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL')->hiddenInput(['value' => 3])->label(false);
    else echo $form->field($model, 'ID_ESTADO_ASIGNACION_TEMPORAL')->dropDownList(
            ArrayHelper::map(EstadoAsignacionTemporal::find()->all(),'ID_ESTADO_ASIGNACION_TEMPORAL','NOMBRE_ESTADO_ASIGNACION_TEMPORAL'),
            ['prompt'=>'Seleccione estado de asignación'] )->label('Estado de asignación');
     ?>

     

    <?php if($model->isNewRecord) echo $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL')->hiddenInput(['value' => Yii::$app->user->identity -> ID_DOCENTE])->label(false);
        else echo $form->field($model, 'DOCENTE_ASIGNACION_TEMPORAL')->textInput(['readonly'=>'readonly','value' => $model -> DOCENTE_ASIGNACION_TEMPORAL])->label("ID Docente");
     ?>
        
    <?= $form->field($model, 'CAPACIDAD_ASIGNACION_TEMPORAL')->textInput(['type' => 'number', 'min' => 1, 
    'onchange' => '
$.post(
        "index.php?r=sala/listscaptipo&tipo='.'"+$("select#solicitudasignaciontemporal-tipo_sala_asignacion_temporal").val()+"&cap='.'"+$(this).val()
    , function(data){
             $("select#solicitudasignaciontemporal-sala_asignacion_temporal").html(data);
             document.getElementById("solicitudasignaciontemporal-sala_asignacion_temporal").onchange();
        });
   '
    ]) ?>

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

    <?= $form->field($model, 'SALA_ASIGNACION_TEMPORAL')->dropDownList([], ['prompt' => 'Seleccione una sala.', 'onchange' => 'document.getElementById("solicitudasignaciontemporal-cantidad_bloques_asignacion_temporal").onchange()']); ?>

    <?= $form->field($model, 'FECHA_ASIGNACION_TEMPORAL')->textInput(['type' => 'date', 'min' => "$fecha", 'max' => "$fechamax", 'onchange' => 'document.getElementById("solicitudasignaciontemporal-cantidad_bloques_asignacion_temporal").onchange()']); ?>

    <p class="help-block">Solo puede solicitar salas temporales con un mes de anticipación.</p>
    <?php $id = 0; if($model -> ID_ASIGNACION_TEMPORAL != null) $id = $model -> ID_ASIGNACION_TEMPORAL; ?>
    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL')->textInput(['type' => 'number', 'min' => 1, 'max' => 20, 
        'onchange' => '$.post(
        "index.php?r=bloque/lists4&fecha='.'"+$("input#solicitudasignaciontemporal-fecha_asignacion_temporal").val()+"&sala='.'"+$("select#solicitudasignaciontemporal-sala_asignacion_temporal").val()+"&cantidad='.'"+$(this).val()+"&id='.$id.'"
        ,function(data){
            $("select#solicitudasignaciontemporal-inicio_bloque_asignacion_temporal").html(data);
        });']) ?>
     <p class="help-block">Cada bloque es de 40min y continuados.</p>

    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION_TEMPORAL')->dropDownList([], ['prompt' => 'Seleccione bloque inicial']) ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script type="text/javascript"> $(document).ready(function (){
        document.getElementById("solicitudasignaciontemporal-capacidad_asignacion_temporal").onchange();
        document.getElementById("solicitudasignaciontemporal-tipo_sala_asignacion_temporal").onchange();
        document.getElementById("solicitudasignaciontemporal-sala_asignacion_temporal").onchange();
        document.getElementById("solicitudasignaciontemporal-fecha_asignacion_temporal").onchange();
        document.getElementById("solicitudasignaciontemporal-cantidad_bloques_asignacion_temporal").onchange();

        }); </script>