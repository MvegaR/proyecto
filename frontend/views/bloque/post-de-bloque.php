<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bloque */
/* @var $form ActiveForm */

$this->title = 'Peticion Cambio Horario';
$this->params['breadcrumbs'][] = ['label' => 'Bloques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-de-bloque">
    
    <h1><?= Html::encode('Peticion de cambio de horario') ?></h1>
    
    <?= $msg ?>
    
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'ID_DIA') ?>
        <?= $form->field($model, 'BLOQUE_SIGUIENTE') ?>
        <?= $form->field($model, 'INICIO') ?>
        <?= $form->field($model, 'TERMINO') ?>
        <?= $form->field($model, 'ID_SALA') ?>
        <?= $form->field($model, 'ID_SECCION') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- post-de-bloque -->
