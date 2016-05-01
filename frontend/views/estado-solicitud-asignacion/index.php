<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstadoSolicitudAsignacionoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Solicitud Asignacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Solicitud Asignacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO_SOLICITUD',
            'NOMBRE_ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
