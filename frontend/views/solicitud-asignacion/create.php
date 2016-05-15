<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = 'Solicitar asignación de sala';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud Asignacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
