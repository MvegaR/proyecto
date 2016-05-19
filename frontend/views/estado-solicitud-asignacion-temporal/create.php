<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudAsignacionTemporal */

$this->title = 'Crear Estado Solicitud Asignacion Temporal';
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Asignacion Temporals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-temporal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
