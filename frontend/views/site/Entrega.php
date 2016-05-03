<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Primera semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('RFW01 Autentificación (Marcos)', ['/site/login'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW03 Roles de usuario (Marcos)', ['/site/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW04 Administrar Edificios (Pablo)', ['/edificio/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW05 Administrar salas (Raúl)', ['/sala/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW06 Administrar facultades (Jimena)', ['/facultad/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW07 Administrar carreras (Jimena)', ['/carrera/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW08 Administrar docentes (Pablo)', ['/docente/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW11 Denuncia de salas (María Olga)', ['/post-de-denuncia/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW15 Ayudantia (María Olga)', ['/solicitud-asignacion/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW21 Cifrado (Marcos)', ['/site/login'], ['class'=>'']) ?></p>

    

   
</div>
