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

<div class="form-group col-xs-12">
<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
