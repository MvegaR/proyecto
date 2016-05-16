<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use frontend\models\EstadoSolicitudCambio;
use frontend\models\Asignatura;
use frontend\models\Seccion;
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
    echo Html::activeHiddenInput($model, 'DOCENTE_CAMBIO', ['value' => $idDocente ]); ?>
    <?php
        $asignaturasDelUsuario = "Select A.* 
        from ASIGNATURA A, SECCION S
        where S.ID_DOCENTE = $idDocente and A.ID_ASIGNATURA = S.ID_ASIGNATURA";
        $tablaDeAsignaturas = new Asignatura;
        $tablaDeAsignaturas = $tablaDeAsignaturas -> findBySql($asignaturasDelUsuario) -> all();
    ?>
    <?= $form->field($model, 'ASIGNATURA_CAMBIO')->dropDownList(
        ArrayHelper::map($tablaDeAsignaturas,'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura', 'onchange' => '$.post("index.php?r=seccion/lists&id='.'"+$(this).val(), function(data){
                             $("select#solicitudcambio-seccion_cambio").html(data);
                        });'] )->label('Seleccione una de sus asignaturas')?> 

    <?= $form->field($model, 'SECCION_CAMBIO')->dropDownList(
        ArrayHelper::map(Seccion::find()->all(),'ID_SECCION','ID_SECCION'),
        ['prompt'=>'Seleccione seccion'] )->label('Seccion') ?> 

   <?= $form->field($model, 'SALA_CAMBIO')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'CAPACIDAD_CAMBIO')->textInput(['type' => 'number', 'min', 'min' => 0, 'value' => 0, 'placeholder' => "Alumnos de la sección"]) ?>

   <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

   <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
