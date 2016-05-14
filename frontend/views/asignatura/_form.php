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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
