<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipoDenuncia */

$this->title = 'Update Tipo Denuncia: ' . ' ' . $model->ID_TIPO_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Denuncias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TIPO_DENUNCIA, 'url' => ['view', 'id' => $model->ID_TIPO_DENUNCIA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-denuncia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
