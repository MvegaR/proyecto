<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DOCENTE') ?>

    <?= $form->field($model, 'ID_ROL') ?>

    <?= $form->field($model, 'ID_DEPARTAMENTO') ?>

    <?= $form->field($model, 'NOMBRE_DOCENTE') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'USER') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'COOKIE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
