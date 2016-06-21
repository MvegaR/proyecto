<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resumen de la importación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

	<h1><?php echo Html::encode($this->title); if(isset($tabla)) echo " [$tabla]";  ?></h1>

	<?php if(count($errores) != 0){?>

		<p><h3>¡Errores!</h3></p>
		<div class="alert alert-danger">
		<ul>
			<?php foreach ($errores as $error) {
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
	<p><h3>Elementos por actualizar</h3><h6> Puede que no existan cambios pero son sus valores finales entregados en el excel</h6></p>
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