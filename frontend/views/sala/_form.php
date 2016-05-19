<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\TipoSala;
use frontend\models\Edificio;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_SALA')->textInput(['maxlength' => true])->label('ID Sala')->input('codigo', ['placeholder' => "Ingrese codigo de sala"]) ?>
    
    <?= $form->field($model, 'ID_TIPO_SALA')->dropDownList(
        ArrayHelper::map(TipoSala::find()->all(),'ID_TIPO_SALA','NOMBRE_TIPO'),
        ['prompt'=>'Seleccionar Tipo de Sala']
    )->label('Tipo de Sala') ?>
    
    <?= $form->field($model, 'ID_EDIFICIO')->dropDownList(
        ArrayHelper::map(Edificio::find()->all(),'ID_EDIFICIO','NOMBRE_EDIFICIO'),
        ['prompt'=>'Seleccionar Edificio']
    )->label('Nombre de Edificio') ?>

    <?= $form->field($model, 'CAPACIDAD_SALA')->textInput(['type' => 'number', 'min' => 1,'placeholder' => "Ingrese capacidad de personas en sala"]) ;?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
