<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudDenuncia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-solicitud-denuncia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTADO_DENUNCIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRE_DENUNCIA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
