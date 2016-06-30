<?php
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$facultades = new Facultad; 
$edificios = new Edificio; 
$salas = new Sala; 
$this->title = 'Lista de salas'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<h1>Horario Salas</h1>
<div>
    
    <?php
  
        foreach($facultades -> find() -> all() as $facultad){
            echo "<div class='col-xs-12'>";
            echo "<h2><p> ".$facultad -> NOMBRE_FACULTAD."</p></h2><br>"; 
            foreach($edificios -> find()-> where(["ID_FACULTAD" => $facultad -> ID_FACULTAD,])-> all() as $edificio){
                echo "<div class='col-xs-12'>";
                echo "<h3><p>".$edificio -> NOMBRE_EDIFICIO."</h3></p><br>"; 
                foreach ($salas -> find()-> where(["ID_EDIFICIO" => $edificio -> ID_EDIFICIO,])-> all() as $sala) { 
                        //echo "<p> -> ->".$sala -> ID_SALA."</p>"; ?>
                      
      
                            <div class="col-md-6 col-sm-6 col-xs-6 " >
                                <div class="panel panel-default col-xs-12" style="background-color:#0064AC">
                                    <div class="panel-body col-xs-12">
                                        <div class="btn-group col-xs-12" >
                                            <button type="button" class="btn btn-default col-xs-12" title="Click para ver horario" onclick="location.href='index.php?r=sala/horario-sala&sala=<?= $sala->ID_SALA ?>'">
                                                <p>Sala <?= $sala->ID_SALA ?></p>
                                                <p>Edificio <?= $edificio->ID_EDIFICIO ?></p>
                                                <p>Capacidad <?= $sala->CAPACIDAD_SALA ?></p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php 
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
                           ?>
                                <div class="col-md-6 col-sm-6 col-xs-6 " >
                                    <div class="panel panel-default col-xs-12" style="background-color:#0064AC">
                                        <div class="panel-body col-xs-12">
                                            <div class="btn-group col-xs-12" >
                                                <button type="button" class="btn btn-default col-xs-12" title="Click para ver horario" onclick="location.href='index.php?r=sala/horario-sala&sala=<?= $sala->ID_SALA ?>'">
                                                <p>Sala <?= $sala->ID_SALA ?></p>
                                                <p>Edificio <?= $edificio->ID_EDIFICIO ?></p>
                                                <p>Capacidad <?= $sala->CAPACIDAD_SALA ?></p>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php              
             }
        echo "</div>";
        }
     echo "</div>";
        
    ?>
</div>