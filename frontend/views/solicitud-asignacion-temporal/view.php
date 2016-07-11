<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\EstadoAsignacionTemporal;
use frontend\models\Rol;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacionTemporal */

$this->title = $model->ID_ASIGNACION_TEMPORAL;
if(!Yii::$app->user->isGuest 
    && !(Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL) == "Docente"
    )$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-temporal-view">

    <h2>Asignación temporal registrada y procesada exitosamente</h2>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ASIGNACION_TEMPORAL',
            'SOLICITUD_TEMPORAL_PADRE',
            //'ID_ESTADO_ASIGNACION_TEMPORAL',
            [
                'attribute' => 'ID_ESTADO_ASIGNACION_TEMPORAL',
                'value' => EstadoAsignacionTemporal::find() -> where(["ID_ESTADO_ASIGNACION_TEMPORAL" => $model -> ID_ESTADO_ASIGNACION_TEMPORAL]) -> one() -> NOMBRE_ESTADO_ASIGNACION_TEMPORAL,
            ],
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
