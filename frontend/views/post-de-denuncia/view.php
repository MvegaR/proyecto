<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = $model->ID_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Reporte de salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_DENUNCIA',
            'ID_TIPO_DENUNCIA',
            'ID_ESTADO_DENUNCIA',
            'FACULTAD_DENUNCIA',
            'EDIFICIO_DENUNCIA',
            'SALA_DENUNCIA',
            'BLOQUE_DENUNCIA',
            'FECHA_DENUNCIA',
        ],
    ]) ?>

</div>
