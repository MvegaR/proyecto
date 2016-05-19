<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Edificio */

$this->title = $model->ID_EDIFICIO;
$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edificio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_EDIFICIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar',, ['delete', 'id' => $model->ID_EDIFICIO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_EDIFICIO',
            'ID_FACULTAD',
            'NOMBRE_EDIFICIO',
        ],
    ]) ?>

</div>
