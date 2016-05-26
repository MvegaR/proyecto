<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudAsignacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes asignación de sala';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitud Asignacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
