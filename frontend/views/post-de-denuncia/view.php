<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = $model->ID_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Post De Denuncias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_DENUNCIA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_DENUNCIA], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
