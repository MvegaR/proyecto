<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Docente;
use frontend\models\Asignatura;
use yii\helpers\Arrayhelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Seccion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seccion-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'ID_SECCION')->textInput(['maxlength' => true])->input('codigo', ['placeholder' => "Ingrese codigo de seccion"]) ?>

<?= $form->field($model, 'ID_DOCENTE')->dropDownList(
   ArrayHelper::map(Docente::find()->all(),'ID_DOCENTE','NOMBRE_DOCENTE'),
        ['prompt'=>'Seleccione docente'] )->label('Docente') ?>

     <?= $form->field($model, 'ID_ASIGNATURA')->dropDownList(
        ArrayHelper::map(Asignatura::find()->all(),'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura'] )->label('Asignatura') ?>

    <?= $form->field($model, 'CUPO')->textInput(['type' => 'number', 'min' => 1, 'placeholder' => "Máximo de alumnos en la seccion"])?>
<div class="control-label"><label>Horas de clase</label></div>
<div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_TEO')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Teóricas"); ?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Computación"); ?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_AYUDANTIA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Ayudantia");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_LAB_FISICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Física");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_LAB_QUIMICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Química");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_LAB_ROBOTICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab Robótica");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_LAB_MECANICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Mecánica");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_TALLER_ARQUITECTURA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Taller Arquitectura");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORA_TALLER_MADERA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Taller Maderas");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_GYM')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Gimnasio");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
<?= $form->field($model, 'HORAS_AUDITORIO')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Auditorio");?>
</div>

<div class="form-group col-xs-12">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
