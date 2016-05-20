<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Departamento;
use frontend\models\Facultad;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacultadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facultades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Facultad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_FACULTAD',
            [
                'attribute' => 'ID_DEPARTAMENTO',
                'value' => 'iDDEPARTAMENTO.NOMBRE_DEPARTAMENTO',  
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_DEPARTAMENTO', 
                    ArrayHelper::map(Departamento::find()->asArray()->all(),'ID_DEPARTAMENTO', 'NOMBRE_DEPARTAMENTO'), ['class' => 'form-control','prompt' => 'Seleccione un departamento']),//atributos html del selector
            ],
            'NOMBRE_FACULTAD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
