<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudCambio */

$this->title = 'Update Estado Solicitud Cambio: ' . ' ' . $model->ID_ESTADO_CAMBIO;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_CAMBIO, 'url' => ['view', 'id' => $model->ID_ESTADO_CAMBIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-solicitud-cambio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
