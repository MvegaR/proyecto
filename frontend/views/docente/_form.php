<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Rol;
use frontend\models\Facultad;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */
/* @var $form yii\widgets\ActiveForm */


?>
<script type="text/javascript" src="js/validaRut.js"></script>
<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DOCENTE')->textInput(['maxlength' => true])->label("RUT Docente")->input('rut', ['placeholder' => 'Ingrese rut con puntos y guion','onchange' => 'checkRutField();']) ?>

    <?= $form->field($model, 'ID_ROL')->dropDownList(
        ArrayHelper::map(Rol::find()->all(),'ID_ROL','NOMBRE_ROL'),
        ['prompt'=>'Seleccione Rol'] )->label('Rol') ?>

    <?= $form->field($model, 'ID_FACULTAD')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad'] )->label('Facultad') ?>

    <?= $form->field($model, 'NOMBRE_DOCENTE')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre"]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true])->input('email', ['placeholder' => "Ingrese email"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
