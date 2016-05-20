<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bloque */

$this->title = 'Modificar Bloque: ' . ' ' . $model->ID_BLOQUE;
$this->params['breadcrumbs'][] = ['label' => 'Bloques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_BLOQUE, 'url' => ['view', 'id' => $model->ID_BLOQUE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bloque-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
