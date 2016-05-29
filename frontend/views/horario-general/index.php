<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horario General';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <ul class="list-group">
  <li class="list-group-item list-group-item-success">Si hay salas disponibles</li>
  <li class="list-group-item list-group-item-danger">No hay salas disponibles</li>
</ul>
<div class= "table-responsive">
    <table class="table table-bordered">
    <tr>
        <th>Hora</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miercoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sabado</th>
    </tr>
    <?php 
        for($j = 0; $j < 20; $j++){
            if($j == 0) echo '<tr><th>08:10 - 08:50</th>';
            else if($j == 1) echo '<tr><th>08:50 - 09:30</th>';
            else if($j == 2) echo '<tr><th>09:40 - 10:20</th>';
            else if($j == 3) echo '<tr><th>10:20 - 11:00</th>';
            else if($j == 4) echo '<tr><th>11:10 - 11:50</th>';
            else if($j == 5) echo '<tr><th>11:50 - 12:30</th>';
            else if($j == 6) echo '<tr><th>12:40 - 13:20</th>';
            else if($j == 7) echo '<tr><th>13:20 - 14:00</th>';
            else if($j == 8) echo '<tr><th>14:10 - 14:50</th>';
            else if($j == 9) echo '<tr><th>14:50 - 15:30</th>';
            else if($j == 10) echo '<tr><th>15:40 - 16:20</th>';
            else if($j == 11) echo '<tr><th>16:20 - 17:00</th>';
            else if($j == 12) echo '<tr><th>17:10 - 17:50</th>';
            else if($j == 13) echo '<tr><th>17:50 - 18:30</th>';
            else if($j == 14) echo '<tr><th>18:40 - 19:20</th>';
            else if($j == 15) echo '<tr><th>19:20 - 20:00</th>';
            else if($j == 16) echo '<tr><th>20:10 - 20:50</th>';
            else if($j == 17) echo '<tr><th>20:50 - 21:30</th>';
            else if($j == 18) echo '<tr><th>21:40 - 22:20</th>';
            else if($j == 19) echo '<tr><th>22:20 - 23:00</th>';
            for($i = 0; $i < 6; $i++){
                if($array[$j+(20*$i)] > 0) echo '<td><a href="'.Url::toRoute(["horario-general/disponibles", "dia" => $i+1,"inicio" => $j]).'" class="list-group-item list-group-item-success" title="Click para ver salas disponibles"><span class="glyphicon glyphicon-ok-sign">'.$array[$j+(20*$i)].' Disponibles</spam></a></td>';
                else echo '<td><a href="#" class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign">0 Disponible</spam></a></td>';
            }
            echo '</tr>';
        }
    ?>
    </table>
</div>
</div>
