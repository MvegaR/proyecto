<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacion */

$this->title = 'Update Estado Solicitud Asignacion: ' . ' ' . $model->ID_ESTADO_SOLICITUD;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Asignacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_SOLICITUD, 'url' => ['view', 'id' => $model->ID_ESTADO_SOLICITUD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-solicitud-asignacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
