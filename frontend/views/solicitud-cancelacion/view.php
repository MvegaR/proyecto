<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\EstadoSolicitudCancelacion;
use frontend\models\Rol;
/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */

$this->title = $model->ID_CANCELACION;
if(!Yii::$app->user->isGuest 
    && !(Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL) == "Docente"
    )$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cancelación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cancelacion-view">

    <h2>Solicitud de cancelación registrada y procesada exitosamente</h2>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_CANCELACION',
            [
            'attribute' => 'ID_ESTADO_CANCELACION',
            'value'  =>EstadoSolicitudCancelacion::find()-> where(['ID_ESTADO_CANCELACION' => $model -> ID_ESTADO_CANCELACION ])->one() -> NOMBRE_ESTADO_CANCELACION
            ],
            //'ID_ESTADO_CANCELACION',
            'DOCENTE_CANCELACION',
            'ASIGNATURA_CANCELACION',
            'SECCION_CANCELACION',
            'BLOQUE_CANCELACION',
            'MOTIVO:ntext',
        ],
    ]) ?>

</div>
