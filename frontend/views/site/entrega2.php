<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Segunda semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('RFW02 Importación de datos (Marcos) (pendiente)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW09 Generación de usuario y contraseña docentes (Pablo)', ['docente/create'], ['class'=>'']) ?></p>
        -Formulario de cambio de contraseña y nombre de usuario. <br><br>
        -Verificar RUT<br><br>
    <p><?= Html::a('RFW10 Administración de asignaturas (Raul)', ['asignatura/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW12 CTRL+Z (Raul) (cambiar a campos de seleccion)', ['solicitud-cancelacion/create'], ['class'=>'']) ?></p>
        -Campos de selección<br><br>
        
    <p><?= Html::a('RFW13 Cambio de sala (Raul)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
        -Campos de selección<br><br>
        -MODIFICAR BASE DE DATOS Y AGREGAR CAMPO SALA ACTUAL Y CAMPO DE TIPO DE SALA REQUERIDO.
    <p><?= Html::a('RFW14 Anulación de sala (María)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
        -Campos de selección<br><br>
        
    <p><?= Html::a('RFW16 Ver horario (pablo) (pendiente)', [''], ['class'=>'']) ?></p>
        -Es el horario desde un docente (usuario conectado)<br><br>
        
    <p><?= Html::a('RFW17 Información salas (Marí) (incompleto)', ['sala/lista'], ['class'=>'']) ?></p>
        -Tabla de horarios de una sala (información publica)<br><br>
        
    <p><?= Html::a('RFW18 Archivo Excel (Marcos)', ['sala/index'], ['class'=>'']) ?></p>
        -Falta exportar toda la DB y no solo algunas tablas.<br><br>
        
    <p><?= Html::a('RFW19 Modificación de permisos (Jimena) (modificar/eliminar req)', [''], ['class'=>'']) ?></p>
        -Se borra<br><br>
        
    <p><?= Html::a('RFW20 Ayuda al usuario (Jimena) (Completar)', ['docente/create'], ['class'=>'']) ?></p>
        -Formularios de solicitud (hay que esperar que le pongan campos de selección)<br><br>
        
    <p><?= Html::a('RFW22 Protección contra spam (Jimena)', ['post-de-denuncia/create'], ['class'=>''])?></p>

    

   
</div>
