<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostDeDenunciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post De Denuncias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post De Denuncia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DENUNCIA',
            'ID_TIPO_DENUNCIA',
            'ID_ESTADO_DENUNCIA',
            'FACULTAD_DENUNCIA',
            'EDIFICIO_DENUNCIA',
            // 'SALA_DENUNCIA',
            // 'BLOQUE_DENUNCIA',
            // 'FECHA_DENUNCIA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
