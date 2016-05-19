<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use frontend\models\Asignatura;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-cancelacion-form">

    <?php $form = ActiveForm::begin(); ?>


        <?php 
    if(!($model->isNewRecord)){

        echo $form->field($model, 'ID_ESTADO_CANCELACION')->dropDownList(
            ArrayHelper::map(EstadoSolicitudCambio::find()->all(),'ID_ESTADO_CANCELACION','NOMBRE_ESTADO_CAMBIO'),
            ['prompt'=>'Seleccione estado de cambio'] )->label('Estado de cambio');
    }else{
       echo $form->field($model, 'ID_ESTADO_CANCELACION')->hiddenInput(['value' => 3])->label(false);
   }
   ?>

    <?php 
     $idDocente = null;
     if(!Yii::$app -> user -> isGuest){
          $idDocente = Yii::$app -> user -> identity -> ID_DOCENTE;
    }
    echo Html::activeHiddenInput($model, 'DOCENTE_CANCELACION', ['value' => $idDocente ]); 
    ?>

    <?php
        $asignaturasDelUsuario = "Select A.* 
        from asignatura A, seccion S
        where S.ID_DOCENTE = $idDocente and A.ID_ASIGNATURA = S.ID_ASIGNATURA";
        $tablaDeAsignaturas = new Asignatura;
        $tablaDeAsignaturas = $tablaDeAsignaturas -> findBySql($asignaturasDelUsuario) -> all();
    ?>

    <?= $form->field($model, 'ASIGNATURA_CANCELACION')->dropDownList(
        ArrayHelper::map($tablaDeAsignaturas,'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura', 'onchange' => '$.post("index.php?r=seccion/lists&id='.'"+$(this).val(), function(data){
           $("select#solicitudcancelacion-seccion_cancelacion").html(data);
          });'] )->label('Seleccione una de sus asignaturas')
    ?>


    <?= $form->field($model, 'SECCION_CANCELACION')->dropDownList(
        [],
        ['prompt'=>'Seleccione seccion', 'onchange' => '$.post("index.php?r=bloque/lists3&id='.'"+$(this).val(), function(data){
           $("select#solicitudcancelacion-bloque_cancelacion").html(data);
       });'] )->label('Seccion') 
    ?> 

    <?= $form->field($model, 'BLOQUE_CANCELACION')->dropDownList([], ['prompt' => 'Seleccione bloque a cancelar'])->label("Bloque a cancelar") ?>

    <?= $form->field($model, 'MOTIVO')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
