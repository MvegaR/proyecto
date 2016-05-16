<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Segunda semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('RFW02 Importación de datos (Marcos) (PENDIENTE)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW09 Generación de usuario y contraseña docentes (Pablo)', ['docente/create'], ['class'=>'']) ?></p>
        -Formulario de cambio de contraseña y nombre de usuario. <br><br>
    <p><?= Html::a('RFW10 Administración de asignaturas (Raul)', ['asignatura/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW12 CTRL+Z (Raul)', ['solicitud-cancelacion/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW13 Cambio de sala (Raul)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW14 Anulación de sala (María)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW16 Ver horario (pablo) (PENDIENTE)', [''], ['class'=>'']) ?></p>
        -Es el horario desde un docente (usuario conectado)<br><br>
        
    <p><?= Html::a('RFW17 Información salas (Marí) (PENDIENTE)', ['sala/lista'], ['class'=>'']) ?></p>
        -Tabla de horarios de una sala (información publica)<br><br>
        
    <p><?= Html::a('RFW18 Exportar a Archivo Excel (Marcos)', ['sala/index'], ['class'=>'']) ?></p>
        -Falta exportar toda la DB y no solo algunas tablas.<br><br>
        
    <p><?= Html::a('RFW20 Ayuda al usuario (Jimena)', ['docente/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW22 Protección contra spam (Jimena)', ['post-de-denuncia/create'], ['class'=>''])?></p>

    

   
</div>
