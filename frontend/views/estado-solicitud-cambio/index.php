<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstadoSolicitudCambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Solicitud Cambios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-cambio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Solicitud Cambio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO_CAMBIO',
            'NOMBRE_ESTADO_CAMBIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
