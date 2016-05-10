<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EdificioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edificios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edificio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edificio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_EDIFICIO',
            'ID_FACULTAD',
            'NOMBRE_EDIFICIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php
echo "Exportar, seleccione columnas y formato: ";
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'ID_EDIFICIO',
    'ID_FACULTAD',
    'NOMBRE_EDIFICIO',
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
