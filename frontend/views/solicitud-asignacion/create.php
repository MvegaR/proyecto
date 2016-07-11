<?php

use yii\helpers\Html;
use frontend\models\Rol;

/* @var $this yii\web\View */
/* @var $model frontend\models\SolicitudAsignacion */

$this->title = 'Solicitar asignación de sala';
if(!Yii::$app->user->isGuest 
	&& !(Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL) == "Docente"
	)
		$this->params['breadcrumbs'][] = ['label' => 'Solicitudes de Asignaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-asignacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
