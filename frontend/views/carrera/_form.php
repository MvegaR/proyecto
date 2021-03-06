<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Facultad;

/* @var $this yii\web\View */
/* @var $model frontend\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_CARRERA')->textInput(['maxlength' => true])->input('codigo', ['placeholder' => "Ingrese codigo de carrera"]) ?>

    <?= $form->field($model, 'ID_FACULTAD')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad'] )->label('Facultad') ?>

    <?= $form->field($model, 'NOMBRE_CARRERA')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre de carrera"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
