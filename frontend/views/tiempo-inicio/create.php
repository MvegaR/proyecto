<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TiempoInicio */

$this->title = 'Crear Tiempo Inicio';
$this->params['breadcrumbs'][] = ['label' => 'Tiempos Iniciales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiempo-inicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
