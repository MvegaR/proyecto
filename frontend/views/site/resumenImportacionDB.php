<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resumen de la importación de la base de datos';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--nececito Array de agregar, array de actualizar, array de no cambios, pagina anterior, errores, nombre tabla -->
<div>
<h1><?php echo Html::encode($this->title); ?> </h1>
<?php
$isError = false;

foreach ($tablas as $tabla) {
	if($tabla == "Worksheet") continue;
?>
	<h1><?php if(isset($tabla)) {echo "[$tabla]";  }?></h1>

	<?php

	 //si hay error en claves foraneas verificar que no se este corrigiendo en la importación y eliminar el error.
	$erroresRevisados = [];
	if(isset($errores[$tabla]) && count($errores[$tabla]) != 0){
		
		foreach ($errores[$tabla] as $error) {
			$noEsError = false;
			if(isset($error['tabla']) && isset($error['columna']) && isset($error['valor'])){
				foreach ($agregar[$error['tabla']] as $dato) {
					$i = 0;
					for(; $i < sizeof($columnas[$error['tabla']]); $i++){
						if(array_values($columnas[$error['tabla']])[$i]['COLUMN_NAME'] == $error['columna']){
							break;
						}
					}

					if($dato[$i] == $error['valor']){
						$noEsError = true;
						break;
					}
				}
				if(!$noEsError){
					array_push($erroresRevisados, $error);
				}
				$noEsError = false;
			}
			
		}
		$errores[$tabla] = $erroresRevisados;
	}
	

	
	?>

	<?php if(isset($errores[$tabla]) && count($errores[$tabla]) != 0){?>

		<p><h3>¡Errores!</h3></p>
		<div class="alert alert-danger">
		<ul>
			<?php 

			foreach ($errores[$tabla] as $error) {
				if(isset($error['tabla']) && isset($error['columna']) && $error['valor']){
					echo "<li> Inserte en '".$error['tabla']."' una tupla con clave '".$error['columna']."' igual a '".$error['valor']."'"."<br></li>";
				}else if(isset($error['cantidad'])){
					echo $error['cantidad'];
				}
			} 
			?>
		</ul>
		</div>
	<?php } ?>
	<p><h3>Elementos por agregar</h3></p>
		<div class="table-responsive">
		<table class="table">
			<tr>
			<?php
				foreach ($columnas[$tabla] as $columna) {
					echo "<td>".array_values($columna)[0]."</td>";
				}
			?>
			</tr>
			<?php
			foreach ($agregar[$tabla] as $dato) {
				echo "<tr>";
				$contador = 0;
				foreach ($columnas[$tabla] as $columna) {
					echo "<td>$dato[$contador]</td>" ;
					$contador++;
				}
				echo "</tr>";
			}
			?>
		</table>
		</div>
	<p><h3>Elementos por actualizar</h3></p>
		<div class="table-responsive">
			<table class="table">
			<tr>
			<?php
				foreach ($columnas[$tabla] as $columna) {
					echo "<td>".array_values($columna)[0]."</td>";
				}
			?>
			</tr>

			<?php
			foreach ($actualizar[$tabla] as $dato) {
				echo "<tr>";
				$contador = 0;
				foreach ($columnas[$tabla] as $columna) {
					echo "<td>$dato[$contador]</td>" ;
					$contador++;
				}
				echo "</tr>";
			}
			?>
		</table>
		</div>
		<p><h6> Puede que no existan cambios pero son sus valores finales entregados en el excel</h6></p>
	<p>
		
	</p>
	<?php
	 if(isset($errores[$tabla]) && count($errores[$tabla]) != 0){ 
		$isError = true; 
		} 
	?>


<?php
}
?>
	<button class="btn btn-danger" onclick="location.href='index.php?r=<?php echo $paginaAnterior; ?>'">Cancelar</button>
	<?php if($isError){ ?>
	<button class="btn btn-success" disabled>Continuar</button>
	<?php } ?>
	<?php if(!$isError){ ?> 
			<button class="btn btn-success" onclick="location.href='index.php?r=<?php echo "site/ejecutar-importacionbd&inputFile=$archivo";?>'">Continuar</button>
	<?php } ?>

	<br>
</div>