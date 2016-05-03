<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sala */

$this->title = 'Modificar Sala con ID: ' . $model->ID_SALA;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_SALA, 'url' => ['view', 'id' => $model->ID_SALA]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="sala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
