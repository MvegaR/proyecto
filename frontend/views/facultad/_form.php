<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Edificio;

/* @var $this yii\web\View */
/* @var $model frontend\models\Facultad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facultad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_EDIFICIO')->dropDownList(
        ArrayHelper::map(Edificio::find()->all(),'ID_EDIFICIO','NOMBRE_EDIFICIO'),
        ['prompt'=>'Seleccione Edificio'] )->label('Edificio') ?>

    <?= $form->field($model, 'NOMBRE_FACULTAD')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
