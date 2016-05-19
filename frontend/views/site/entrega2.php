<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Segunda semana de desarrollo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    Falta: <br>
    <br>
    Funcionalidad: <br>
     -Ver horario usuario autentificado (docente)<br>
    -Ver horarios de una sala determinada. (publico)<br>
     -Horario general (estadisticas), para identificar por colores el estado de asignación en promedio de bloques<br>
    -Importar desde excel.<br>

    <br>
    Estetica:<br>
    -Cambiar numeros ID por su Nombre, en todos los index.php y view.php siguiento el video (ejemplo ya hecho index.php de docente) -> https://www.youtube.com/watch?v=OLfz7Iy_y84<br>
    -Cambiar a español texto vistas: view.php, index.php, update.php y _form.php<br>
    -Migas de pan (breadcrumbs) y que diferencie admin de docente y invitado<br>
    -Link en el menu lateral (solo cosas faltantes)<br>

    <br>

    <p><?= Html::a('RFW02 Importación de datos (Marcos) (PENDIENTE)', [''], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW09 Generación de usuario y contraseña docentes (Pablo)', ['docente/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW10 Administración de asignaturas (Raul)', ['asignatura/index'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW12 CTRL+Z (Raul)', ['solicitud-cancelacion/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW13 Cambio de sala (Raul)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
    <p><?= Html::a('RFW14 Anulación de sala (María)', ['solicitud-cambio/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW16 Ver horario (pablo) (PENDIENTE)', [''], ['class'=>'']) ?></p>
        -Es el horario desde un docente (usuario conectado)<br><br>
        
    <p><?= Html::a('RFW17 Información salas (Marí) (PENDIENTE)', ['sala/lista'], ['class'=>'']) ?></p>
        -Tabla de horarios de una sala (información publica)<br><br>
        
    <p><?= Html::a('RFW18 Exportar a Archivo Excel (Marcos)', ['sala/index'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW20 Ayuda al usuario (Jimena)', ['docente/create'], ['class'=>'']) ?></p>
        
    <p><?= Html::a('RFW22 Protección contra spam (Jimena)', ['post-de-denuncia/create'], ['class'=>''])?></p>
    <p>
        


    </p>
    

   
</div>
