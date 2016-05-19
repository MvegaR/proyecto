<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudCambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Cambio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cambio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitud Cambio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CAMBIO',
            'ID_ESTADO_CAMBIO',
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'SALA_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div></div>
