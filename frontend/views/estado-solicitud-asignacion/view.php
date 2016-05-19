<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacion */

$this->title = $model->ID_ESTADO_SOLICITUD;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Asignacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ESTADO_SOLICITUD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar',, ['delete', 'id' => $model->ID_ESTADO_SOLICITUD], [
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
            'ID_ESTADO_SOLICITUD',
            'NOMBRE_ESTADO',
        ],
    ]) ?>

</div>
