<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = 'Modificar Post De Denuncia: ' . ' ' . $model->ID_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Post De Denuncias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DENUNCIA, 'url' => ['view', 'id' => $model->ID_DENUNCIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-de-denuncia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
