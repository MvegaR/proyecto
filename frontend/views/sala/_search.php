<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostSalafrontend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sala-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_SALA') ?>

    <?= $form->field($model, 'ID_TIPO_SALA') ?>

    <?= $form->field($model, 'ID_EDIFICIO') ?>

    <?= $form->field($model, 'CAPACIDAD_SALA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
