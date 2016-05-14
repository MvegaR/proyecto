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
        ['prompt'=>'Seleccione estado'] )->label('Estado'); ?>
   

    <?php 
    $idDocente = null;
    if(!Yii::$app -> user -> isGuest){
        $idDocente = Yii::$app -> user -> identity -> ID_DOCENTE;
    }
    Html::activeHiddenInput($model, 'DOCENTE_ASIGNACION', ['value' => $idDocente ]); ?>
    
    <?= $form->field($model, 'ASIGNATURA_ASIGNACION')->dropDownList(
        ArrayHelper::map(Asignatura::find()->all(),'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura'] )->label('Asignatura') //falta filtar?> 

    <?= $form->field($model, 'SECCION_ASIGNACION')->dropDownList(
        ArrayHelper::map(Seccion::find()->all(),'ID_SECCION','ID_SECCION'),
        ['prompt'=>'Seleccione seccion'] )->label('Seccion') //falta filtar ?> 

    <?= $form->field($model, 'CAPACIDAD_ASIGNACION')->textInput(['type' => 'number', 'min' => 1, 'placeholder' => "Ingrese capacidad"]); ?>

     <?= $form->field($model, 'TIPO_SALA_ASIGNACION')->dropDownList(
        ArrayHelper::map(TipoSala::find()->all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
        ['prompt'=>'Seleccione tipo sala'] )->label('Tipo sala') //falta filtar ?>
		
	<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
