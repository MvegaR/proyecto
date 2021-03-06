<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dia */

$this->title = $model->ID_DIA;
$this->params['breadcrumbs'][] = ['label' => 'Dias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_DIA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_DIA], [
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
            'ID_DIA',
            'NOMBRE',
        ],
    ]) ?>

</div>
