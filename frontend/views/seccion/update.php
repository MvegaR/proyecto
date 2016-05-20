<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Seccion */

$this->title = 'Modificar Seccion: ' . ' ' . $model->ID_SECCION;
$this->params['breadcrumbs'][] = ['label' => 'Seccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_SECCION, 'url' => ['view', 'id' => $model->ID_SECCION]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
