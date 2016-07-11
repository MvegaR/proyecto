<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Bloque;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horario Profesor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <div class= "table-responsive">
    <table class="table table-bordered table-hover table-condensed text-center">
    <thead>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sabado</th>
    </thead>
    <?php 
        for($j = 0; $j < 20; $j++){
            if($j == 0) echo '<tr><th>I: 08:10 <br><br> F:08:50</th>';
            else if($j == 1) echo '<tr><th>I: 08:50 <br><br> F:09:30</th>';
            else if($j == 2) echo '<tr><th>I: 09:40 <br><br> F:10:20</th>';
            else if($j == 3) echo '<tr><th>I: 10:20 <br><br> F:11:00</th>';
            else if($j == 4) echo '<tr><th>I: 11:10 <br><br> F:11:50</th>';
            else if($j == 5) echo '<tr><th>I: 11:50 <br><br> F:12:30</th>';
            else if($j == 6) echo '<tr><th>I: 12:40 <br><br> F:13:20</th>';
            else if($j == 7) echo '<tr><th>I: 13:20 <br><br> F:14:00</th>';
            else if($j == 8) echo '<tr><th>I: 14:10 <br><br> F:14:50</th>';
            else if($j == 9) echo '<tr><th>I: 14:50 <br><br> F:15:30</th>';
            else if($j == 10) echo '<tr><th>I: 15:40 <br><br> F:16:20</th>';
            else if($j == 11) echo '<tr><th>I: 16:20 <br><br> F:17:00</th>';
            else if($j == 12) echo '<tr><th>I: 17:10 <br><br> F:17:50</th>';
            else if($j == 13) echo '<tr><th>I: 17:50 <br><br> F:18:30</th>';
            else if($j == 14) echo '<tr><th>I: 18:40 <br><br> F:19:20</th>';
            else if($j == 15) echo '<tr><th>I: 19:20 <br><br> F:20:00</th>';
            else if($j == 16) echo '<tr><th>I: 20:10 <br><br> F:20:50</th>';
            else if($j == 17) echo '<tr><th>I: 20:50 <br><br> F:21:30</th>';
            else if($j == 18) echo '<tr><th>I: 21:40 <br><br> F:22:20</th>';
            else if($j == 19) echo '<tr><th>I: 22:20 <br><br> F:23:00</th>';
            for($i = 0; $i < 6; $i++){
                       
                         if($array[$j+(20*$i)] != null){
                            $row=$array[$j+(20*$i)];
                            echo '<td class="success"><b>'.
                            $row[0]['NOMBRE_ASIGNATURA'].
                            '</b><br>'. $row[0]['ID_SECCION'].' <br><b>Cupo:</b> '.$row[0]['CUPO'].
                            '<br> <b>Sala:</b> '.$row[0]['ID_SALA'].' <br><b>Max: </b>'.$row[0]['CAPACIDAD_SALA'].'</td>';
                           }else{
                            $row = [['NOMBRE_ASIGNATURA'=>NULL]];
                            echo '<td>'.$row[0]['NOMBRE_ASIGNATURA'].'</td>';
                           }
                         
            }
            
            echo '</tr>';
        }
    ?>
    </table>

    <div>
        
        <h3>Solicitudes temporales registradas:
        </h3>
        <?php foreach ($solicitudes as $solicitud) {
            echo "<li>"."Fecha: ".$solicitud -> FECHA_ASIGNACION_TEMPORAL." Sala: ".$solicitud -> SALA_ASIGNACION_TEMPORAL." Hora inicio: ". Bloque::find()->where(["ID_BLOQUE" => $solicitud -> INICIO_BLOQUE_ASIGNACION_TEMPORAL]) -> one() -> INICIO." Cantidad de periodos: ". $solicitud -> CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL;
        }

        ?>
        <br>
        <br>

    </div>
</div>
</div>
