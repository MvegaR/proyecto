<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudCancelacion */

$this->title = 'Modificar Estado Solicitud Cancelacion: ' . ' ' . $model->ID_ESTADO_CANCELACION;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Cancelación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_CANCELACION, 'url' => ['view', 'id' => $model->ID_ESTADO_CANCELACION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-solicitud-cancelacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
