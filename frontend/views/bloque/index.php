<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bloques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bloque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_BLOQUE',
            'ID_DIA',
            'ID_SALA',
            'ID_SECCION',
            'INICIO',
            // 'TERMINO',
            // 'BLOQUE_SIGUIENTE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
