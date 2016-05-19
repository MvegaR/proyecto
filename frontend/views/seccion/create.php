<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Seccion */

$this->title = 'Crear Seccion';
$this->params['breadcrumbs'][] = ['label' => 'Seccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
