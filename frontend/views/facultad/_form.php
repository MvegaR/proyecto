<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Departamento;
/* @var $this yii\web\View */
/* @var $model frontend\models\Facultad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facultad-form">

    <?php $form = ActiveForm::begin(); ?>

 
    <?= $form->field($model, 'ID_DEPARTAMENTO')->dropDownList(ArrayHelper::map(Departamento::find()->all(), 'ID_DEPARTAMENTO', 'NOMBRE_DEPARTAMENTO'), ['prompt' => "Seleccione departamento"]) ?>

    <?= $form->field($model, 'NOMBRE_FACULTAD')->textInput(['maxlength' => true])->input('nombre', ['placeholder' => "Ingrese nombre de la facultad"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
