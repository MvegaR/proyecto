<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Dia;
use frontend\models\Sala;
use frontend\models\Seccion;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bloque */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bloque-form">
<b>CRUD a automatizar en programa Java</b>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DIA')->dropDownList(
        ArrayHelper::map(Dia::find()->all(),'ID_DIA','NOMBRE'),
        ['prompt'=>'Seleccione día'] )->label('Día') ?>

    <?= $form->field($model, 'ID_SALA')->dropDownList(
        ArrayHelper::map(Sala::find()->all(),'ID_SALA','ID_SALA'),
        ['prompt'=>'Seleccione sala'] )->label('Sala') ?>

    <?= $form->field($model, 'ID_SECCION')->dropDownList(
        ArrayHelper::map(Seccion::find()->all(),'ID_SECCION','ID_SECCION'),
        ['prompt'=>'Seleccione Seccion'] )->label('Sección') ?>
    
    <?= $form->field($model, 'INICIO')->textInput()->input('inicio', ['placeholder' => "Ingrese hora de inicio del bloque"]) ?>

    <?= $form->field($model, 'TERMINO')->textInput()->input('termino', ['placeholder' => "Ingrese hora de termino del bloque"]) ?>

    <?= $form->field($model, 'BLOQUE_SIGUIENTE')->textInput()->input('siguiente', ['placeholder' => "Ingrese el bloque que viene a continuacion"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
