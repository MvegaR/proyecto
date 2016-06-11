<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TiempoInicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiempos de Inicio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiempo-inicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tiempo Inicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TIEMPO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
