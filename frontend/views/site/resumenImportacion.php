<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resumen de la importación';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--nececito Array de agregar, array de actualizar, array de no cambios, pagina anterior, errores, nombre tabla -->
<div>

	<h1><?php echo Html::encode($this->title); if(isset($tabla)) echo " [$tabla]";  ?></h1>

	<?php if(count($errores) != 0){?>

		<p><h3>¡Claves foraneas que debe de cumplir para importar este archivo!</h3></p>
		<div class="alert alert-danger">
		<ul>
			<?php foreach ($errores as $error) {
					
					echo "<li>".$error."<br></li>";
					
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
				foreach ($columnas as $columna) {
					echo "<td>".array_values($columna)[0]."</td>";
				}
			?>
			</tr>
			<?php
			foreach ($agregar as $dato) {
				echo "<tr>";
				$contador = 0;
				foreach ($columnas as $columna) {
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
				foreach ($columnas as $columna) {
					echo "<td>".array_values($columna)[0]."</td>";
				}
			?>
			</tr>

			<?php
			foreach ($actualizar as $dato) {
				echo "<tr>";
				$contador = 0;
				foreach ($columnas as $columna) {
					echo "<td>$dato[$contador]</td>" ;
					$contador++;
				}
				echo "</tr>";
			}
			?>
		</table>
		</div>
	<p>
		
	</p>
	<button class="btn btn-danger" onclick="location.href='index.php?r=<?php echo $paginaAnterior; ?>'">Cancelar</button>
	<?php if(count($errores) != 0){ ?>
	<button class="btn btn-success" disabled>Continuar</button>
	<?php } ?>
	<?php if(count($errores) == 0){ ?> 
			<button class="btn btn-success" onclick="location.href='index.php?r=<?php echo "site/ejecutar-importacion&el=$tabla&inputFile=$archivo";?>'">Continuar</button>
	<?php } ?>

	

	<br>
</div>