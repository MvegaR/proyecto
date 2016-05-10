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


    <?= $form->field($model, 'ID_ASIGNATURA')->textInput(['maxlength' => true])->input('email', ['placeholder' => "Ingrese el codigo de la asignatura"])->label(false); ?>

    <?= $form->field($model, 'ID_CARRERA')->dropDownList(
        ArrayHelper::map(Carrera::find()->all(),'ID_CARRERA','NOMBRE_CARRERA'),
        ['prompt'=>'Seleccione carrera'] )->label('Carrera') ?>

    <?= $form->field($model, 'NOMBRE_ASIGNATURA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ANIO')->textInput() ?>

    <?= $form->field($model, 'SEMESTRE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
