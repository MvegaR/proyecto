<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = $model->ID_ASIGNACION;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ASIGNACION], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar',, ['delete', 'id' => $model->ID_ASIGNACION], [
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
            'ID_ASIGNACION',
            'ID_ESTADO_SOLICITUD',
            'DOCENTE_ASIGNACION',
            'ASIGNATURA_ASIGNACION',
            'SECCION_ASIGNACION',
            'CAPACIDAD_ASIGNACION',
            'TIPO_SALA_ASIGNACION',
        ],
    ]) ?>

</div>
