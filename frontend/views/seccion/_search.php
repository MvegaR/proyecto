<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SeccionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_SECCION') ?>

    <?= $form->field($model, 'ID_DOCENTE') ?>

    <?= $form->field($model, 'ID_ASIGNATURA') ?>

    <?= $form->field($model, 'CUPO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
