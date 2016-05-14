<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_SECCION',
            'ID_DOCENTE',
            'ID_ASIGNATURA',
            'CUPO',
            'HORAS_TEO',
            'HORAS_LAB',
            'HORAS_AYUDANTIA',
            'HORA_LAB_FISICA',
            'HORA_LAB_QUIMICA',
            'HORA_LAB_ROBOTICA',
            'HORA_LAB_MECANICA',
            'HORA_TALLER_ARQUITECTURA',
            'HORA_TALLER_MADERA',
            'HORAS_GYM',
            'HORAS_AUDITORIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
