<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignatura */

$this->title = $model->ID_ASIGNATURA;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_ASIGNATURA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_ASIGNATURA], [
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
            'ID_ASIGNATURA',
            'ID_CARRERA',
            'NOMBRE_ASIGNATURA',
            'ANIO',
            'SEMESTRE',
            'HORAS_TEO',
            'HORAS_LAB_COM',
            'HORAS_AYUDANTIA',
            'HORAS_LAB_FISICA',
            'HORAS_LAB_QUIMICA',
            'HORAS_LAB_ROBOTICA',
            'HORAS_LAB_MECANICA',
            'HORAS_TALLER_ARQUITECTURA',
            'HORAS_TALLER_MADERA',
            'HORAS_GYM',
            'HORAS_AUDITORIO',
        ],
    ]) ?>

</div>
