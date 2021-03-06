<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Docente */

$this->title = $model->ID_DOCENTE;
$this->params['breadcrumbs'][] = ['label' => 'Cambio de usuario o contraseña', 'url' => ['update']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->ID_DOCENTE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID_DOCENTE], [
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
            //'ID_DOCENTE',
            //'ID_ROL',
            //'ID_FACULTAD',
            //'NOMBRE_DOCENTE',
            //'EMAIL:email',
            'USER',
            //'PASSWORD',
            //'COOKIE',
        ],
    ]) ?>

</div>
