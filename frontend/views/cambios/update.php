<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */

$this->title = 'Actualizar Docente: ' . ' ' . $model->ID_DOCENTE;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DOCENTE, 'url' => ['view', 'id' => $model->ID_DOCENTE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
