<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstadoSolicitudAsignacionTemporalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Solicitud Asignacion Temporals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-temporal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Solicitud Asignacion Temporal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO_ASIGNACION_TEMPORAL',
            'NOMBRE_ESTADO_ASIGNACION_TEMPORAL',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
