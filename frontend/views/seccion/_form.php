<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Docente;
use frontend\models\Asignatura;
use yii\helpers\Arrayhelper;
use frontend\models\Carrera;


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

</div>
<div class="form-group field-carrera">
<label class="control-label" for="seccion-carrera">Carrera</label>
<?= Html::DropDownList('Carrera', null,ArrayHelper::map(Carrera::find()->all(),'ID_CARRERA','NOMBRE_CARRERA'),['class'=>  'form-control', 'onclick' => 
'
$.post(
        "index.php?r=asignatura/lists&carrera='.'"+$(this).val()
    , function(data){
             $("select#seccion-id_asignatura").html(data);
        });
'
]) ; ?>
</div>

     <?= $form->field($model, 'ID_ASIGNATURA')->dropDownList(
        ArrayHelper::map(Asignatura::find()->all(),'ID_ASIGNATURA','NOMBRE_ASIGNATURA'),
        ['prompt'=>'Seleccione asignatura'] )->label('Asignatura') ?>

    <?= $form->field($model, 'CUPO')->textInput(['type' => 'number', 'min' => 1, 'placeholder' => "Máximo de alumnos en la seccion"])?>

<div class="form-group col-xs-12">
<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
