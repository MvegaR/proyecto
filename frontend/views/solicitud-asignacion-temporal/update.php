<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */

$this->title = 'Update Solicitud Asignacion Temporal: ' . ' ' . $model->ID_ASIGNACION_TEMPORAL;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ASIGNACION_TEMPORAL, 'url' => ['view', 'id' => $model->ID_ASIGNACION_TEMPORAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-asignacion-temporal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
