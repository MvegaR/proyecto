<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\EstadoSolicitudDenuncia;
use frontend\models\TipoDenuncia;
/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = $model->ID_DENUNCIA;
$this->params['breadcrumbs'][] = ['label' => 'Reporte de salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-view">

    <h2>Reporte envíado correctamente para su revisión por el administrador.</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_DENUNCIA',
            //'ID_TIPO_DENUNCIA',
                                    [
                'attribute' => 'ID_TIPO_DENUNCIA',
                'value' => TipoDenuncia::find() -> where(["ID_TIPO_DENUNCIA" => $model -> ID_TIPO_DENUNCIA]) -> one() -> NOMBRE_TIPO_DENUNCIA,
            ],
                        [
                'attribute' => 'ID_ESTADO_DENUNCIA',
                'value' => EstadoSolicitudDenuncia::find() -> where(["ID_ESTADO_DENUNCIA" => $model -> ID_ESTADO_DENUNCIA]) -> one() -> NOMBRE_DENUNCIA,
            ],
            //'ID_ESTADO_DENUNCIA',
            'FACULTAD_DENUNCIA',
            'EDIFICIO_DENUNCIA',
            'SALA_DENUNCIA',
            'BLOQUE_DENUNCIA',
            'FECHA_DENUNCIA',
        ],
    ]) ?>

</div>
