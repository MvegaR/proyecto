<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bloque */

$this->title = $model->ID_BLOQUE;
$this->params['breadcrumbs'][] = ['label' => 'Bloques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID_BLOQUE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->ID_BLOQUE], [
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
            'ID_BLOQUE',
            'ID_DIA',
            'ID_SALA',
            'ID_SECCION',
            'INICIO',
            'TERMINO',
            'BLOQUE_SIGUIENTE',
        ],
    ]) ?>

</div>
