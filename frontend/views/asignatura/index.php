<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AsignaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Asignatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ASIGNATURA',
            'ID_CARRERA',
            'NOMBRE_ASIGNATURA',
            'ANIO',
            'SEMESTRE',            
            'HORAS_TEO', 
            'HORAS_LAB_COM', 
            'HORAS_AYUDANTIA', 
            'HORAS_LAB_FISICA', 
            'HORAS_LAB_QUIMICA', 
            'HORAS_LAB_ROBOTICA', 
            'HORAS_LAB_MECANICA', 
            'HORAS_TALLER_ARQUITECTURA', 
            'HORAS_TALLER_MADERA', 
            'HORAS_GYM', 
            'HORAS_AUDITORIO', 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    <?php
echo "Exportar, seleccione columnas y formato: ";
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'ID_ASIGNATURA',
    'ID_CARRERA',
    'NOMBRE_ASIGNATURA',
    'SEMESTRE',
    ['class' => 'yii\grid\ActionColumn'],
];

// Renders a export dropdown menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'target' => '_self'
]);

?>

</div>
