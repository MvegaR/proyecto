<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Segunda semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('RFW02 Importación de datos (Marcos) (pendiente)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW09 Generación de usuario y contraseña docentes (Pablo) (verificar rut)', ['docente/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW10 Administración de asignaturas (Raul)', ['asignatura/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW12 CTRL+Z (Raul) (cambiar a campos de seleccion)', ['solicitud-cancelacion/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW13 Cambio de sala (Raul) (cambiar a campos de seleccion)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW14 Anulación de sala (María) (cambiar a campos de seleccion)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW16 Ver horario (pablo) (pendiente)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW17 Información salas (Marí) (incompleto)', ['sala/lista'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW18 Archivo Excel (Marcos)', ['sala/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW19 Modificación de permisos (Jimena) (modificar/eliminar req)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW20 Ayuda al usuario (Jimena) (Completar)', ['docente/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW22 Protección contra spam (Jimena)', ['post-de-denuncia/create'], ['class'=>''])?></p>

    

   
</div>
