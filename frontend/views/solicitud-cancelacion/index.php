<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudCancelacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitud Cancelacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cancelacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solicitud Cancelacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CANCELACION',
            'ID_ESTADO_CANCELACION',
            'DOCENTE_CANCELACION',
            'ASIGNATURA_CANCELACION',
            'SECCION_CANCELACION',
            // 'BLOQUE_CANCELACION',
            // 'MOTIVO:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
