<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Facultad;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Departamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_FACULTAD')->dropDownList(ArrayHelper::map(Facultad::find()->all(), 'ID_FACULTAD', 'NOMBRE_FACULTAD'), ['prompt' => "Seleccione departamento"]) ?>

    <?= $form->field($model, 'NOMBRE_DEPARTAMENTO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
