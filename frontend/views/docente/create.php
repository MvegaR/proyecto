<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */

$this->title = 'Insertar Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
