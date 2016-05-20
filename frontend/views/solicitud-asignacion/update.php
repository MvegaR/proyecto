<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = 'Modificar Solicitud Asignacion: ' . ' ' . $model->ID_ASIGNACION;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ASIGNACION, 'url' => ['view', 'id' => $model->ID_ASIGNACION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-asignacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
