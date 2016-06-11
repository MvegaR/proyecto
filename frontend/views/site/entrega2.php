<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Cosas faltantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    Funcionalidad:<br>
    -Importación de la BD completa desde un solo excel. 
    <br>
    <br>
    <br>
    <br>
    Estetica:<br>
    -Migas de pan (breadcrumbs) y que diferencie admin de docente y invitado<br>
    -Cambiar numeros ID por su Nombre, en todos los index.php y view.php siguiento el video (ejemplo ya hecho index.php de docente) -> https://www.youtube.com/watch?v=OLfz7Iy_y84<br>
   
edificio -> id facultad<br>
bloque -> id Dia<br>
Asignatura -> Id carrera<br>
Solicitudes asignación de sala ->  estado, docente, tipo sala.<br>
Solicitudes de Asignacion Temporal -> estado, docente, tipo sala.<br>
Solicitud de cambio -> estado, docente.<br>
Solicitudes cancelacion -> estado, docente, <br>
reportes de sala (post de denuncia) -> tipo denuncia, estado denuncia, facultad, edificio.<br>
    <br>
    <br>
    <br>
    <br>



    <p><?= Html::a('RFW02 Importación de datos (Marcos) (PENDIENTE 80%)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW09 Generación de usuario y contraseña docentes (Pablo)', ['docente/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW10 Administración de asignaturas (Raul)', ['asignatura/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW12 CTRL+Z (Raul)', ['solicitud-cancelacion/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW13 Cambio de sala (Raul)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW14 Anulación de sala (María)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW16 Ver horario (pablo)', [''], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW17 Información salas (Marí)', ['sala/lista'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW18 Exportar a Archivo Excel (Marcos)', ['sala/index'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW20 Ayuda al usuario (Jimena)', ['docente/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW22 Protección contra spam (Jimena)', ['post-de-denuncia/create'], ['class'=>''])?></p>
    <p>
        


    </p>
    

   
</div>
