<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\TipoDenuncia;
use frontend\models\EstadoDenuncia;
use frontend\models\Facultad;
use frontend\models\Sala;
use frontend\models\Bloque;
use frontend\models\Edificio;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-de-denuncia-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'ID_TIPO_DENUNCIA')->dropDownList(
        ArrayHelper::map(TipoDenuncia::find()->all(),'ID_TIPO_DENUNCIA','NOMBRE_TIPO_DENUNCIA'),
        ['prompt'=>'Seleccione tipo de denuncia'] )->label('Tipo de Denuncia') ?>

    <?php if(!($model->isNewRecord))

    $form->field($model, 'ID_ESTADO_DENUNCIA')->dropDownList(
        ArrayHelper::map(EstadoDenuncia::find()->all(),'ID_ESTADO_DENUNCIA','NOMBRE_ESTADO_DENUNCIA'),
        ['prompt'=>'Seleccione estado de denuncia'] )->label('Estado de denuncia')
     ?>

    <?= $form->field($model, 'FACULTAD_DENUNCIA')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad'] )->label('Facultad') ?>

    <?= $form->field($model, 'EDIFICIO_DENUNCIA')->dropDownList(
        ArrayHelper::map(Edificio::find()->all(),'ID_EDIFICIO','NOMBRE_EDIFICIO'),
        ['prompt'=>'Seleccionar Edificio']
    )->label('Nombre de Edificio') ?>

    <?= $form->field($model, 'SALA_DENUNCIA')->dropDownList(
        ArrayHelper::map(Sala::find()->all(),'ID_SALA','ID_SALA'),
        ['prompt'=>'Seleccione sala'] )->label('Sala') ?>

    <?= $form->field($model, 'BLOQUE_DENUNCIA')->dropDownList(
        ArrayHelper::map(Bloque::find()->all(),'ID_BLOQUE','ID_BLOQUE'),
        ['prompt'=>'Seleccione bloque'] )->label('Bloque') ?>

    <?php date_default_timezone_set('America/Argentina/Buenos_Aires'); 
    Html::activeHiddenInput($model, 'FECHA_DENUNCIA', ['value' => date('Y-m-d H:i:s')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
