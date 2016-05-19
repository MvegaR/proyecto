<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */

$this->title = $model->ID_CANCELACION;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cancelacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cancelacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_CANCELACION], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar',, ['delete', 'id' => $model->ID_CANCELACION], [
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
            'ID_CANCELACION',
            'ID_ESTADO_CANCELACION',
            'DOCENTE_CANCELACION',
            'ASIGNATURA_CANCELACION',
            'SECCION_CANCELACION',
            'BLOQUE_CANCELACION',
            'MOTIVO:ntext',
        ],
    ]) ?>

</div>
