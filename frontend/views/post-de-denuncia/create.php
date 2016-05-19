<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PostDeDenuncia */

$this->title = 'Crear Post De Denuncia';
$this->params['breadcrumbs'][] = ['label' => 'Post De Denuncias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
