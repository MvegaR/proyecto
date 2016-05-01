<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BloqueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bloque-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_BLOQUE') ?>

    <?= $form->field($model, 'ID_DIA') ?>

    <?= $form->field($model, 'ID_SALA') ?>

    <?= $form->field($model, 'ID_SECCION') ?>

    <?= $form->field($model, 'INICIO') ?>

    <?php // echo $form->field($model, 'TERMINO') ?>

    <?php // echo $form->field($model, 'BLOQUE_SIGUIENTE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
