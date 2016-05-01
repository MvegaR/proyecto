<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambio */

$this->title = $model->ID_CAMBIO;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cambio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_CAMBIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_CAMBIO], [
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
            'ID_CAMBIO',
            'ID_ESTADO_CAMBIO',
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',
        ],
    ]) ?>

</div>
