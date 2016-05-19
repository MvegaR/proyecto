<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoDenuncia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-denuncia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE_TIPO_DENUNCIA')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre del tipo de denuncia"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
