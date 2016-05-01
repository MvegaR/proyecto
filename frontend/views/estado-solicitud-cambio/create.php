<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudCambio */

$this->title = 'Create Estado Solicitud Cambio';
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-cambio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
