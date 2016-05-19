<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Rol */

$this->title = 'Crear Rol';
$this->params['breadcrumbs'][] = ['label' => 'Rols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
