<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoSolicitudCancelacion */

$this->title = 'Crear Estado Solicitud Cancelacion';
$this->params['breadcrumbs'][] = ['label' => 'Estado Solicitud Cancelacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-cancelacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
