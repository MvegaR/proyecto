<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use frontend\models\EstadoSolicitudCambio;
use frontend\models\Asignatura;
use frontend\models\Seccion;
use frontend\models\TipoSala;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cambio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    if(!($model->isNewRecord)){

        echo $form->field($model, 'ID_ESTADO_CAMBIO')->dropDownList(
            ArrayHelper::map(EstadoSolicitudCambio::find()->all(),'ID_ESTADO_CAMBIO','NOMBRE_ESTADO_CAMBIO'),
            ['prompt'=>'Seleccione estado de cambio'] )->label('Estado de cambio');
    }else{
       echo $form->field($model, 'ID_ESTADO_CAMBIO')->hiddenInput(['value' => 3])->label(false);
   }
   ?>

   <?php 
     $idDocente = null;
     if(!Yii::$app -> user -> isGuest){
          $idDocente = Yii::$app -> user -> identity -> ID_DOCENTE;
    }
    echo Html::activeHiddenInput($model, 'DOCENTE_CAMBIO', ['value' => $idDocente ]); 
    ?>

    <?php
    $asignaturasDelUsuario = "Select A.* from asignatura A, seccion S where S.ID_DOCENTE = $idDocente and A.ID_ASIGNATURA = S.ID_ASIGNATURA";
    $tablaDeAsignaturas = new Asignatura;
    $tablaDeAsignaturas = $tablaDeAsignaturas -> findBySql($asignaturasDelUsuario) -> all();
    ?>


    <?= $form->field($model, 'ASIGNATURA_CAMBIO')->dropDownList(
        ArrayHelper::map($tablaDeAsignaturas,'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura', 'onchange' => '$.post("index.php?r=seccion/lists&id='.'"+$(this).val(), function(data){
           $("select#solicitudcambio-seccion_cambio").html(data);
           document.getElementById("solicitudcambio-seccion_cambio").onchange();
       });'] )->label('Seleccione una de sus asignaturas')?> 


    <?= $form->field($model, 'SECCION_CAMBIO')->dropDownList(
        [],
        ['prompt'=>'Seleccione seccion', 'onchange' => '$.post("index.php?r=bloque/lists2&id="+$(this).val(), function(data){
           $("select#solicitudcambio-sala_cambio").html(data);
           document.getElementById("solicitudcambio-tipo_cambio").onchange();
        

       });'] )->label('Seccion') 
    ?> 

   <?= $form->field($model, 'SALA_CAMBIO')->dropDownList([], ['prompt' => 'Seleccione sala', 'onchange' => '
    document.getElementById("solicitudcambio-tipo_cambio").onchange();
    ',])->label("Sala origen") ?>



   <?= $form->field($model, 'CAPACIDAD_CAMBIO')->textInput(['type' => 'number', 'min', 'min' => 0, 'value' => 0, 'placeholder' => "Alumnos de la sección", 'onchange' => '
    document.getElementById("solicitudcambio-tipo_cambio").onchange();
    ',]) ?>

  <?= $form->field($model, 'TIPO_CAMBIO')->dropDownList(
        ArrayHelper::map(TipoSala::find()->all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
        ['prompt'=>'Seleccione tipo sala',
        'onchange' => '$.post("index.php?r=sala/listscaptipo2&tipo='.
        '"+$(this).val()+"&cap='.'"+$("input#solicitudcambio-capacidad_cambio").val()+"&sala='
        .'"+$("select#solicitudcambio-sala_cambio").val()+"&sec='
        .'"+$("select#solicitudcambio-seccion_cambio").val(),function(data){ $("select#solicitudcambio-sala_cambio2").html(data); 
      });' ] )->label('Tipo sala');
      ?>

   <?= $form->field($model, 'SALA_CAMBIO2')->dropDownList([], ['prompt' => 'Seleccione sala'])->label("Sala destino") ?>

   <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

   <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
