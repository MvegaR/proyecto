<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\EstadoSolicitudAsignacion;
use frontend\models\Rol;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = $model->ID_ASIGNACION;

if(!Yii::$app->user->isGuest 
    && !(Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL) == "Docente"
    )$this->params['breadcrumbs'][] = ['label' => 'Solicitudes de asignación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-view">

    <h1> Solicitud de asignación registrada correctamente en el sistema. </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ASIGNACION',
            [
                'attribute' => 'ID_ESTADO_SOLICITUD',
                'value' => EstadoSolicitudAsignacion::find() -> where(["ID_ESTADO_SOLICITUD" => $model -> ID_ESTADO_SOLICITUD]) -> one() -> NOMBRE_ESTADO,
            ],
            //'ID_ESTADO_SOLICITUD',
            'DOCENTE_ASIGNACION',
            'ASIGNATURA_ASIGNACION',
            'SECCION_ASIGNACION',
            'CAPACIDAD_ASIGNACION',
            'TIPO_SALA_ASIGNACION',
            'SALA_ASIGNACION',
            'CANTIDAD_BLOQUES_ASIGNACION',
            'INICIO_BLOQUE_ASIGNACION',
        ],
    ]) ?>

</div>
