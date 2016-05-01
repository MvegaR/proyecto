<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCambio */

$this->title = 'Update Solicitud Cambio: ' . ' ' . $model->ID_CAMBIO;
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_CAMBIO, 'url' => ['view', 'id' => $model->ID_CAMBIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitud-cambio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
