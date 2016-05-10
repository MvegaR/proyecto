<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstadoSolicitudCancelacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Solicitud Cancelacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-cancelacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Solicitud Cancelacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO_CANCELACION',
            'NOMBRE_ESTADO_CANCELACION',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
