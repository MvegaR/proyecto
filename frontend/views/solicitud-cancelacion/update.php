<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */

$this->title = 'Modificar Solicitud Cancelacion: ' . ' ' . $model->ID_CANCELACION;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cancelación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_CANCELACION, 'url' => ['view', 'id' => $model->ID_CANCELACION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-cancelacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
