<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use frontend\models\EstadoSolicitudCambio;
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
    if(($model->isNewRecord))
        echo $form->field($model, 'DOCENTE_CAMBIO')->hiddenInput(['value' => Yii::$app -> user -> identity -> ID_DOCENTE,]) -> label(false);
        else echo $form->field($model, 'DOCENTE_CAMBIO')->hiddenInput() -> label(false);  
    ?>

    <?= $form->field($model, 'ASIGNATURA_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SECCION_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SALA_CAMBIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAPACIDAD_CAMBIO')->textInput(['type' => 'number', 'min', 'min' => 0, 'value' => 0, 'placeholder' => "Alumnos de la sección"]) ?>

    <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
