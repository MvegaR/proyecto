<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\TipoDenuncia;
use frontend\models\EstadoSolicitudDenuncia;
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
       ['prompt'=>'Seleccione tipo de reporte'] )->label('Tipo de reporte') ?>

    <?php 
    if(!($model->isNewRecord)){

            echo $form->field($model, 'ID_ESTADO_DENUNCIA')->dropDownList(
                ArrayHelper::map(EstadoSolicitudDenuncia::find()->all(),'ID_ESTADO_DENUNCIA','NOMBRE_DENUNCIA'),
                ['prompt'=>'Seleccione estado de denuncia'] )->label('Estado de denuncia');
    }else{
       echo $form->field($model, 'ID_ESTADO_DENUNCIA')->hiddenInput(['value' => 3])->label(false);
    }
     ?>

    <?= $form->field($model, 'FACULTAD_DENUNCIA')->dropDownList(
        ArrayHelper::map(Facultad::find()->all(),'ID_FACULTAD','NOMBRE_FACULTAD'),
        ['prompt'=>'Seleccione Facultad', 
        'onchange' => '$.post("index.php?r=edificio/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-edificio_denuncia").html(data);
                        });'
        ])->label('Facultad') ?>

    <?= $form->field($model, 'EDIFICIO_DENUNCIA')->dropDownList(
        ArrayHelper::map(Edificio::find()->all(),'ID_EDIFICIO','NOMBRE_EDIFICIO'),
        ['prompt'=>'Seleccionar Edificio',
        'onchange' => '$.post("index.php?r=sala/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-sala_denuncia").html(data);
                        });']
    )->label('Nombre de Edificio') ?>

    <?= $form->field($model, 'SALA_DENUNCIA')->dropDownList(
        ArrayHelper::map(Sala::find()->all(),'ID_SALA','ID_SALA'),
        ['prompt'=>'Seleccione sala',
        'onchange' => '$.post("index.php?r=bloque/lists&id='.'"+$(this).val(), function(data){
                             $("select#postdedenuncia-bloque_denuncia").html(data);
                        });'
        ] )->label('Sala') ?>

    <?= $form->field($model, 'BLOQUE_DENUNCIA')->dropDownList(
        [],
        ['prompt'=>'Seleccione bloque'] )->label('Bloque') ?>
    <!-- inicio fecha -->
    <?php date_default_timezone_set('Chile/Continental'); 
     echo $form->field($model, 'FECHA_DENUNCIA')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false);?>

    <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
