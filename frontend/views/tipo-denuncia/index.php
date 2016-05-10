<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TipoDenunciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Denuncias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-denuncia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Denuncia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_TIPO_DENUNCIA',
            'NOMBRE_TIPO_DENUNCIA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
