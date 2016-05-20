<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TiempoInicio */

$this->title = 'Modificar Tiempo Inicio: ' . ' ' . $model->TIEMPO;
$this->params['breadcrumbs'][] = ['label' => 'Tiempo Inicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TIEMPO, 'url' => ['view', 'id' => $model->TIEMPO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiempo-inicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
