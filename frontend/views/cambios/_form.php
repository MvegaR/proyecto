<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD_REPEAT')->passwordInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
