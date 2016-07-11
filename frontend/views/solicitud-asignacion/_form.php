<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\TipoSolicitudAsignacion;
use frontend\models\TipoSala;
use frontend\models\Asignatura;
use frontend\models\Seccion;
use yii\helpers\Arrayhelper;
use himiklab\yii2\recaptcha\ReCaptcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-asignacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    if(!$model->isNewRecord)
        echo $form->field($model, 'ID_ESTADO_SOLICITUD')->dropDownList(
        ArrayHelper::map(TipoSolicitudAsignacion::find()->all(),'ID_ESTADO_SOLICITUD','NOMBRE_ESTADO'),
        ['prompt'=>'Seleccione estado'] )->label('Estado'); 
    ?>
   
    <?php 
    $idDocente = null;
    if(!Yii::$app -> user -> isGuest){
        $idDocente = Yii::$app -> user -> identity -> ID_DOCENTE;
    }
    echo Html::activeHiddenInput($model, 'DOCENTE_ASIGNACION', ['value' => $idDocente ]); 

    echo Html::activeHiddenInput($model, 'ID_ESTADO_SOLICITUD', ['value' => 1 ]); 

    ?>

    <?php
        $asignaturasDelUsuario = "Select A.* 
        from asignatura A, seccion S
        where S.ID_DOCENTE = '$idDocente' and A.ID_ASIGNATURA = S.ID_ASIGNATURA";
        $tablaDeAsignaturas = new Asignatura;
      
        $tablaDeAsignaturas = $tablaDeAsignaturas -> findBySql($asignaturasDelUsuario) -> all();
            
      
    ?>
    <?= $form->field($model, 'ASIGNATURA_ASIGNACION')->dropDownList(
        ArrayHelper::map($tablaDeAsignaturas,'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura', 'onchange' => '$.post("index.php?r=seccion/lists&id='.'"+$(this).val(), function(data){
                             $("select#solicitudasignacion-seccion_asignacion").html(data);
                             document.getElementById("solicitudasignacion-seccion_asignacion").onchange();
                        });'] )->label('Seleccione una de sus asignaturas')?> 

    <?= $form->field($model, 'SECCION_ASIGNACION')->dropDownList(
        [],
        ['prompt'=>'Seleccione seccion', 'onchange' => '$.post("index.php?r=seccion/lists2&id='.'"+$(this).val(), function(data){
                             document.getElementById("solicitudasignacion-capacidad_asignacion").value = data;
                             document.getElementById("solicitudasignacion-capacidad_asignacion").max = data;

                        });',] )->label('Primero seleccione asignatura') ?> 

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION')->textInput(['type' => 'number', 'min' => 1, 'max'=> 1,]) // nececita un onChange ?> 

     <?= $form->field($model, 'TIPO_SALA_ASIGNACION')->dropDownList(
        ArrayHelper::map(TipoSala::find()->all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
        ['prompt'=>'Seleccione tipo sala', 'onchange' => '$.post(
        "index.php?r=sala/listscaptipo&tipo='.'"+$(this).val()+"&cap='.'"+$("input#solicitudasignacion-capacidad_asignacion").val()
    , function(data){
             $("select#solicitudasignacion-sala_asignacion").html(data);
        });'] )->label('Tipo sala') ?>

      <?= $form->field($model, 'SALA_ASIGNACION')->dropDownList([], ['prompt' => 'Seleccione una sala.', 'onchange' => 'document.getElementById("solicitudasignacion-inicio_bloque_asignacion").onchange()']); ?>

   <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION')->textInput(['type' => 'number', 'min' => 1, 'max' => 20, 
        'onchange' => '$.post(
        "index.php?r=bloque/lists5&sala='.'"+$("select#solicitudasignacion-sala_asignacion").val()+"&cantidad='.'"+$(this).val()
        ,function(data){
            $("select#solicitudasignacion-inicio_bloque_asignacion").html(data);
        });']) ?>
     <p class="help-block">Cada bloque es de 40min y continuados.</p>
    
    <?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION')->dropDownList([], ['prompt' => 'Seleccione bloque inicial'])?> 

	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
