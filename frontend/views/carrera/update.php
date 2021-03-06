<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Carrera */

$this->title = 'Modificar Carrera: ' . ' ' . $model->ID_CARRERA;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_CARRERA, 'url' => ['view', 'id' => $model->ID_CARRERA]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="carrera-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
