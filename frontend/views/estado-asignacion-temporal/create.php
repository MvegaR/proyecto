<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EstadoAsignacionTemporal */

$this->title = 'Crear Estado Asignacion Temporal';
$this->params['breadcrumbs'][] = ['label' => 'Estado Asignacion Temporal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-asignacion-temporal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
