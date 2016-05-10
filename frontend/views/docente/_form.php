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

<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DOCENTE')->textInput(['maxlength' => true])->label("RUT Docente")->input('rut', ['placeholder' => "Ingrese rut con puntos y guion"]) ?>

    <?= $form->field($model, 'ID_ROL')->dropDownList(
        ArrayHelper::map(Rol::find()->all(),'ID_ROL','NOMBRE_ROL'),
        ['prompt'=>'Seleccione Rol'] )->label('Rol') ?>

    <?= $form->field($model, 'ID_FACULTAD')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad'] )->label('Facultad') ?>

    <?= $form->field($model, 'NOMBRE_DOCENTE')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre"]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true])->input('email', ['placeholder' => "Ingrese email"]) ?>

    <?= $form->field($model, 'USER')->textInput(['maxlength' => true])->input('user', ['placeholder' => "Ingrese nombre de usuario"]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true])->input('password', ['placeholder' => "Ingrese clave de usuario"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
