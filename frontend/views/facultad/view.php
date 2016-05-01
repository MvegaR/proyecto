<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Facultad */

$this->title = $model->ID_FACULTAD;
$this->params['breadcrumbs'][] = ['label' => 'Facultads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_FACULTAD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_FACULTAD], [
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
            'ID_FACULTAD',
            'ID_EDIFICIO',
            'NOMBRE_FACULTAD',
        ],
    ]) ?>

</div>
