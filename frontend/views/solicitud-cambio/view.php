<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\EstadoSolicitudCambio;
use frontend\models\Rol;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambio */

$this->title = $model->ID_CAMBIO;
if(!Yii::$app->user->isGuest 
    && !(Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL) == "Docente"
    )$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cambio-view">

    <h2>Solicitud de cambio registrada y procesada exitosamente.</h2>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_CAMBIO',
            //'ID_ESTADO_CAMBIO',
                        [
            'attribute' => 'ID_ESTADO_CAMBIO',
            'value'  =>EstadoSolicitudCambio::find()-> where(['ID_ESTADO_CAMBIO' => $model -> ID_ESTADO_CAMBIO ])->one() -> NOMBRE_ESTADO_CAMBIO
            ],
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'SALA_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',
        ],
    ]) ?>

</div>
