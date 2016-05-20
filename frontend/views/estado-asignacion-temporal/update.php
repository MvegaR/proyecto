<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacionTemporal */

$this->title = 'Modificar Estado Solicitud Asignacion Temporal: ' . ' ' . $model->ID_ESTADO_ASIGNACION_TEMPORAL;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_ASIGNACION_TEMPORAL, 'url' => ['view', 'id' => $model->ID_ESTADO_ASIGNACION_TEMPORAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-solicitud-asignacion-temporal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
