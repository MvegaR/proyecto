<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Carrera;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignatura-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'ID_ASIGNATURA')->textInput(['maxlength' => true])->input('codigo', ['placeholder' => "Ingrese el codigo de la asignatura"]) ?>

    <?= $form->field($model, 'ID_CARRERA')->dropDownList(
        ArrayHelper::map(Carrera::find()->all(),'ID_CARRERA','NOMBRE_CARRERA'),
        ['prompt'=>'Seleccione carrera','value = '] )->label('Carrera') ?>

    <?= $form->field($model, 'NOMBRE_ASIGNATURA')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese el nombre de la asignatura"]) ?>

    <?= $form->field($model, 'ANIO')->textInput(['type' => 'number', 'min' => 0, 'placeholder' => "Ingrese el año en que se dicta la asignatura"]); ?>

    <?= $form->field($model, 'SEMESTRE')->textInput(['type' => 'number', 'min' => 1])->input('semestre', ['placeholder' => "Ingrese el semestre en que se dicta la asignatura"]) ?>

    <div class="control-label"><label>Horas de clase</label></div>
<div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_TEO')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Teóricas"); ?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB_COM')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Computación"); ?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_AYUDANTIA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Ayudantia");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB_FISICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Física");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB_QUIMICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Química");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB_ROBOTICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab Robótica");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_LAB_MECANICA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Lab. Mecánica");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_TALLER_ARQUITECTURA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Taller Arquitectura");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_TALLER_MADERA')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Taller Maderas");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
    <?= $form->field($model, 'HORAS_GYM')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Gimnasio");?>
    </div>
    <div class = "col-xs-3">&nbsp;&nbsp;
<?= $form->field($model, 'HORAS_AUDITORIO')->textInput(['type' => 'number','size' => "3", 'maxleng' => '3', 'min' => 0, 'value' => 0, 'placeholder' => "Horas"])->label("Auditorio");?>
</div>

    <div class="form-group col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
