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
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_CAMBIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_CAMBIO], [
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
            'ID_CAMBIO',
            'ID_ESTADO_CAMBIO',
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'SALA_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',
        ],
    ]) ?>

</div>
