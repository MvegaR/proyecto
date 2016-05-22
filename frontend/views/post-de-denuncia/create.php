<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = 'Crear reporte a una sala';
$this->params['breadcrumbs'][] = ['label' => 'Reporte de salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
