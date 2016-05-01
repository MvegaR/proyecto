<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenunciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-de-denuncia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DENUNCIA') ?>

    <?= $form->field($model, 'ID_TIPO_DENUNCIA') ?>

    <?= $form->field($model, 'ID_ESTADO_DENUNCIA') ?>

    <?= $form->field($model, 'FACULTAD_DENUNCIA') ?>

    <?= $form->field($model, 'EDIFICIO_DENUNCIA') ?>

    <?php // echo $form->field($model, 'SALA_DENUNCIA') ?>

    <?php // echo $form->field($model, 'BLOQUE_DENUNCIA') ?>

    <?php // echo $form->field($model, 'FECHA_DENUNCIA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
