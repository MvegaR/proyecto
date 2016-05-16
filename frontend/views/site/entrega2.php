<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Segunda semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

        Falta: <br>
    -Importar desde excel y respaldar BD a excel.<br>
    -formularios de cambio de usuario y contraseña para el usuario autentificado<br>
    -Cambiar valores de identificadores foraneos a valores si es que tienen en cada index.php y view.php. (ver ejemplo vista docente index.php, le falta el view.php)<br>
    -Panel de administración (un menu para todos los crud del admin)<br>
    -Migas de pan (breadcrumbs) (para conectar los index.php con los view.php, create.php, update.php con un link para regresar)<br>
    -Ver horario usuario autentificado (docente)<br>
    -Ver horarios de una sala determinada. (publico)<br>
    -Link en el menu lateral<br>
    -Horario general (estadisticas), para identificar por colores el estado de asignación en promedio de bloques<br>
    <br>

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
    <p>
        


    </p>
    

   
</div>
