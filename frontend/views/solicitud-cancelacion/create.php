<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudCancelacion */

$this->title = 'Crear Solicitud Cancelacion';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Cancelación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cancelacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
