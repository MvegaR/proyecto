<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = $model->ID_ASIGNACION;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes de asignación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ASIGNACION',
            'ID_ESTADO_SOLICITUD',
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
