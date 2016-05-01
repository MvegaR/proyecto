<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudDenuncia */

$this->title = 'Update Estado Solicitud Denuncia: ' . ' ' . $model->ID_ESTADO_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Denuncias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESTADO_DENUNCIA, 'url' => ['view', 'id' => $model->ID_ESTADO_DENUNCIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-solicitud-denuncia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
