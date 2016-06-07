<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Facultad;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CARRERA',
            //'ID_FACULTAD'
            [
                'attribute' => 'ID_FACULTAD',
                'value' => 'iDFACULTAD.NOMBRE_FACULTAD',
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_FACULTAD', 
                    ArrayHelper::map(Facultad::find()->asArray()->all(),'ID_FACULTAD', 'NOMBRE_FACULTAD'), ['class' => 'form-control','prompt' => 'Seleccione un facultad']),//atributos html del selector
            ],
            'NOMBRE_CARRERA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
        <?php
echo '<div><label class="control-label">Exportar a archivo</label></div>';
$gridColumns = [
    'ID_CARRERA',
    'ID_FACULTAD',
    'NOMBRE_CARRERA',
];

// Renders a export dropdown menu
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'target' => '_self'
]);

?>

</div>
