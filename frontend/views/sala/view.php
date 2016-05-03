<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sala */

$this->title = $model->ID_SALA;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sala-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_SALA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID_SALA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar esta sala?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_SALA',
            'ID_TIPO_SALA',
            'ID_EDIFICIO',
            'CAPACIDAD_SALA',
        ],
    ]) ?>

</div>
