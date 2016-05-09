<?php
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;
use yii\helpers\Html;
$facultades = new Facultad; 
$edificios = new Edificio; 
$salas = new Sala; 
$this->title = 'Listas de sala'; 
$this->params['breadcrumbs'][] = $this->title; 
?>
<div class="sala-lista">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
  
    	foreach($facultades -> find() -> all() as $facultad){
    		echo "<p> ".$facultad -> NOMBRE_FACULTAD."</p>"; 

    		foreach($edificios -> find()-> where(["ID_FACULTAD" => $facultad -> ID_FACULTAD,])-> all() as $edificio){
    			echo "<p> ->".$edificio -> NOMBRE_EDIFICIO."</p>"; 

    			foreach ($salas -> find()-> where(["ID_EDIFICIO" => $edificio -> ID_EDIFICIO,])-> all() as $sala) {
    					echo "<p> -> ->".$sala -> ID_SALA."</p>"; 

    			}
    		}
    	}

    ?>

</div>

