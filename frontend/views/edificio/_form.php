<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Facultad;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Edificio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edificio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_EDIFICIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_FACULTAD')->textInput() ?>

    <? $form->field($model, 'ID_FACULTAD')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione facultad'] )->label('Facultad')
     ?>

    <?= $form->field($model, 'NOMBRE_EDIFICIO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
