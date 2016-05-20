<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */

$this->title = $model->ID_ASIGNACION_TEMPORAL;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-temporal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ASIGNACION_TEMPORAL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_ASIGNACION_TEMPORAL], [
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
            'ID_ASIGNACION_TEMPORAL',
            'ID_ESTADO_ASIGNACION_TEMPORAL',
            'DOCENTE_ASIGNACION_TEMPORAL',
            'CAPACIDAD_ASIGNACION_TEMPORAL',
            'TIPO_SALA_ASIGNACION_TEMPORAL',
            'SALA_ASIGNACION_TEMPORAL',
            'FECHA_ASIGNACION_TEMPORAL',
            'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL',
            'INICIO_BLOQUE_ASIGNACION_TEMPORAL',
        ],
    ]) ?>

</div>
