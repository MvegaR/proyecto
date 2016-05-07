<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TiempoInicio */

$this->title = $model->TIEMPO;
$this->params['breadcrumbs'][] = ['label' => 'Tiempo Inicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiempo-inicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TIEMPO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TIEMPO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TIEMPO',
        ],
    ]) ?>

</div>
