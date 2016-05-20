<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudAsignacionTemporalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Asignacion Temporal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-temporal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitud Asignacion Temporal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ASIGNACION_TEMPORAL',
            'ID_ESTADO_ASIGNACION_TEMPORAL',
            'DOCENTE_ASIGNACION_TEMPORAL',
            'TIPO_SALA_ASIGNACION_TEMPORAL',
            'CAPACIDAD_ASIGNACION_TEMPORAL',
            'SALA_ASIGNACION_TEMPORAL',
            'FECHA_ASIGNACION_TEMPORAL',
            'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL',
            'INICIO_BLOQUE_ASIGNACION_TEMPORAL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
