<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Edificio */

$this->title = 'Actualizar Edificio: ' . ' ' . $model->ID_EDIFICIO;
$this->params['breadcrumbs'][] = ['label' => 'Edificios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_EDIFICIO, 'url' => ['view', 'id' => $model->ID_EDIFICIO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edificio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
