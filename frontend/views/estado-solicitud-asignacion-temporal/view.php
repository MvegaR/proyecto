<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacionTemporal */

$this->title = $model->ID_ESTADO_ASIGNACION_TEMPORAL;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-temporal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ESTADO_ASIGNACION_TEMPORAL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar',, ['delete', 'id' => $model->ID_ESTADO_ASIGNACION_TEMPORAL], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ESTADO_ASIGNACION_TEMPORAL',
            'NOMBRE_ESTADO_ASIGNACION_TEMPORAL',
        ],
    ]) ?>

</div>
