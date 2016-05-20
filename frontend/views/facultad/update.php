<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Facultad */

$this->title = 'Modificar Facultad: ' . ' ' . $model->ID_FACULTAD;
$this->params['breadcrumbs'][] = ['label' => 'Facultads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_FACULTAD, 'url' => ['view', 'id' => $model->ID_FACULTAD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facultad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
