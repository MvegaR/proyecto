<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoSala */

$this->title = 'Update Tipo Sala: ' . ' ' . $model->ID_TIPO_SALA;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TIPO_SALA, 'url' => ['view', 'id' => $model->ID_TIPO_SALA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-sala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
