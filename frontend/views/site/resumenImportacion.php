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
	<?php if(isset($errores)) echo $errores; ?>
	<p><h3>Elementos por agregar</h3></p>
		<div>
			<?php
				foreach ($agregar as $dato) {
					echo $dato."<br>";
				}
			?>
			
		</div>
	<p><h3>Elementos por actualizar</h3></p>
		<div>
			<?php
				foreach ($actualizar as $dato) {
					echo print_r($dato)."<br>";
				}
			?>
		</div>
	<p></p>
	<button class="btn btn-danger">Cancelar</button>
	<button class="btn btn-success">Continuar</button>
	<br>
</div>