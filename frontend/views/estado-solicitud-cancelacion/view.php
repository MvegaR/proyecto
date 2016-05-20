<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudCancelacion */

$this->title = $model->ID_ESTADO_CANCELACION;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Cancelacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-cancelacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ESTADO_CANCELACION], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_ESTADO_CANCELACION], [
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
            'ID_ESTADO_CANCELACION',
            'NOMBRE_ESTADO_CANCELACION',
        ],
    ]) ?>

</div>
