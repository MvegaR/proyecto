<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Docente', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DOCENTE',
            'ID_ROL',
            'ID_FACULTAD',
            'NOMBRE_DOCENTE',
            'EMAIL:email',
            'USER',
            // 'PASSWORD',
            // 'COOKIE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php
echo "Exportar, seleccione columnas y formato: ";
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'ID_DOCENTE',
    'ID_ROL',
    'ID_FACULTAD',
    'EMAIL',
    'USER',
    'PASSWORD',
    'COOKIE',
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
