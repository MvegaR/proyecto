<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Carrera */

$this->title = 'Crear Carrera';
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
