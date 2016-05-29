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
    echo Html::activeHiddenInput($model, 'DOCENTE_ASIGNACION', ['value' => $idDocente ]); ?>
    <?php
        $asignaturasDelUsuario = "Select A.* 
        from asignatura A, seccion S
        where S.ID_DOCENTE = $idDocente and A.ID_ASIGNATURA = S.ID_ASIGNATURA";
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
                        });',] )->label('Primero seleccione asignatura') ?> 

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION')->textInput(['type' => 'number', 'min' => 1, 'disabled' => '',]) ?>

     <?= $form->field($model, 'TIPO_SALA_ASIGNACION')->dropDownList(
        ArrayHelper::map(TipoSala::find()->all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
        ['prompt'=>'Seleccione tipo sala'] )->label('Tipo sala') ?>

    <?= $form->field($model, 'SALA_ASIGNACION')->textInput(); ?>

    <?= $form->field($model, 'CANTIDAD_BLOQUES_ASIGNACION')->textInput(['type' => 'number', 'min' => 1, 'max' => 20]); ?>
    
	<?= $form->field($model, 'INICIO_BLOQUE_ASIGNACION')->textInput(); ?>

	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
