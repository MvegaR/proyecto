<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Asignatura */

$this->title = 'Modificar Asignatura: ' . ' ' . $model->ID_ASIGNATURA;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ASIGNATURA, 'url' => ['view', 'id' => $model->ID_ASIGNATURA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
