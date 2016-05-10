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
use himiklab\yii2\recaptcha\ReCaptcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="post-de-denuncia-form">

    <?php $form = ActiveForm::begin();?>

    <?= $form->field($model, 'ID_TIPO_DENUNCIA')->dropDownList(
        ArrayHelper::map(TipoDenuncia::find()->all(),'ID_TIPO_DENUNCIA','NOMBRE_TIPO_DENUNCIA'),
       /* ['prompt'=>'Seleccione tipo de denuncia']*/['placeholder' => "Ingrese el tipo de denuncia"] )->label('Tipo de Denuncia') ?>

    <?php if(!($model->isNewRecord))

    $form->field($model, 'ID_ESTADO_DENUNCIA')->dropDownList(
        ArrayHelper::map(EstadoDenuncia::find()->all(),'ID_ESTADO_DENUNCIA','NOMBRE_ESTADO_DENUNCIA'),
        ['prompt'=>'Seleccione estado de denuncia'] )->label('Estado de denuncia')
     ?>

    <?= $form->field($model, 'FACULTAD_DENUNCIA')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad', 
        'onchange' => '$.post("index.php?edificio/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-edificio_denuncia").html(data);
                        });'
        ])->label('Facultad') ?>

    <?= $form->field($model, 'EDIFICIO_DENUNCIA')->dropDownList(
        ArrayHelper::map(Edificio::find()->all(),'ID_EDIFICIO','NOMBRE_EDIFICIO'),
        ['prompt'=>'Seleccionar Edificio',
        'onchange' => '$.post("index.php?sala/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-sala_denuncia").html(data);
                        });']
    )->label('Nombre de Edificio') ?>

    <?= $form->field($model, 'SALA_DENUNCIA')->dropDownList(
        ArrayHelper::map(Sala::find()->all(),'ID_SALA','ID_SALA'),
        ['prompt'=>'Seleccione sala',
        'onchange' => '$.post("index.php?bloque/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-bloque_denuncia").html(data);
                        });'
        ] )->label('Sala') ?>

    <?= $form->field($model, 'BLOQUE_DENUNCIA')->dropDownList(
        ArrayHelper::map(Bloque::find()->all(),'ID_BLOQUE','ID_BLOQUE'),
        ['prompt'=>'Seleccione bloque'] )->label('Bloque') ?>

    <?php date_default_timezone_set('America/Argentina/Buenos_Aires'); 
    Html::activeHiddenInput($model, 'FECHA_DENUNCIA', ['value' => date('Y-m-d H:i:s')]) ?>

    <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
