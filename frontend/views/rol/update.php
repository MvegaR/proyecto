<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rol */

$this->title = 'Modificar Rol: ' . ' ' . $model->ID_ROL;
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ROL, 'url' => ['view', 'id' => $model->ID_ROL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
