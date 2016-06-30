<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas disponibles';
$this->params['breadcrumbs'][] = ['label' => 'Horario General', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$facultades = new Facultad; 
$edificios = new Edificio; 
$salas = new Sala; 
?>

<div class="bloque-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
<div class= "table-responsive">
<table class="table table-bordered">
    <tr>
        <th>Dia</th>
        <th>Hora</th>
    </tr>
    <tr>
        <td><?php if($dia == 1) echo 'Lunes';
                  else if($dia == 2) echo 'Martes';
                  else if($dia == 3) echo 'Miercoles';
                  else if($dia == 4) echo 'Jueves';
                  else if($dia == 5) echo 'Viernes';
                  else if($dia == 6) echo 'Sabado';
            ?></td>
        <td><?= $hora ?></td>
    </tr>
</table>
</div>
    
<div class="row">

    <?php
  
        foreach($facultades -> find() -> all() as $facultad){
            echo "<div class='col-xs-12'>";
            echo "<h2><p> ".$facultad -> NOMBRE_FACULTAD."</p></h2><br>"; 
            foreach($edificios -> find()-> where(["ID_FACULTAD" => $facultad -> ID_FACULTAD,])-> all() as $edificio){
                echo "<div class='col-xs-12'>";
                echo "<h3><p>".$edificio -> NOMBRE_EDIFICIO."</h3></p><br>"; 
                foreach ($salas -> find()-> where(["ID_EDIFICIO" => $edificio -> ID_EDIFICIO,])-> all() as $sala) { 
                        //echo "<p> -> ->".$sala -> ID_SALA."</p>"; ?>
                        <?php foreach($result as $row):
                        if($row->ID_SALA == $sala -> ID_SALA){ ?>
                            <div class="col-md-6 col-sm-6 col-xs-6 " >
                                <div class="panel panel-default col-xs-12" style="background-color:#0064AC">
                                    <div class="panel-body col-xs-12">
                                        <div class="btn-group col-xs-12" >
                                            <button type="button" class="btn btn-default col-xs-12" title="Click para ver horario" onclick="location.href='index.php?r=sala/horario-sala&sala=<?= $row->ID_SALA ?>'">
                                                <p>Sala <?= $row->ID_SALA ?></p>
                                                <p>Edificio <?= $row->ID_EDIFICIO ?></p>
                                                <p>Capacidad <?= $row->CAPACIDAD_SALA ?></p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }
                        endforeach 
                        ?>
<?php

                }
                echo "</div>";
            }
            echo "</div>";
        }

        echo "<div class='col-xs-12'>";
        echo "<h2><p>Sin facultad</p></h2><br>";
        foreach($edificios -> find()-> where(["ID_FACULTAD" => null,])-> all() as $edificio){
            echo "<div class='col-xs-12'>";
            echo "<h3><p>".$edificio -> NOMBRE_EDIFICIO."</h3></p><br>"; 
            foreach ($salas -> find()-> where(["ID_EDIFICIO" =>$edificio -> ID_EDIFICIO,])-> all() as $sala) {
                foreach($result as $row):
                            if($row->ID_SALA == $sala -> ID_SALA){ ?>
                                <div class="col-md-6 col-sm-6 col-xs-6 " >
                                    <div class="panel panel-default col-xs-12" style="background-color:#0064AC">
                                        <div class="panel-body col-xs-12">
                                            <div class="btn-group col-xs-12" >
                                                <button type="button" class="btn btn-default col-xs-12" title="Click para ver horario" onclick="location.href='index.php?r=sala/horario-sala&sala=<?= $row->ID_SALA ?>'">
                                                    <p>Sala <?= $row->ID_SALA ?></p>
                                                    <p>Edificio <?= $row->ID_EDIFICIO ?></p>
                                                    <p>Capacidad <?= $row->CAPACIDAD_SALA ?></p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                endforeach;
             
             }
        echo "</div>";
        }
     echo "</div>";
        
    ?>




</div>
</div>