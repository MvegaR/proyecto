<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TiempoInicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tiempo-inicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TIEMPO')->textInput(["type"=>"time"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
