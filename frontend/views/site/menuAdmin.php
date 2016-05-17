	<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Menú de administración';
$this->params['breadcrumbs'][] = $this->title;
?>


	<div class="panel panel-default col-xs-12"> 
		<div class="">
			<h1 class="">Administración</h1>
		</div>
		<div class="panel-body">
			<div class="panel panel-default panel col-xs-12"> 
				<h2 class="">Módulo de planificación</h2>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=facultad/index">Facultades</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=edificio/index">Edificios</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=sala/index">Salas</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=bloque/index">Asignaciones</a></p>
			</div>

			<div class="panel panel-default col-xs-12">
				<h2 class="">Módulo de recursos</h2>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=docente/index">Docentes</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=carrera/index">Carreras</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=asignatura/index">Asignaturas</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=seccion/index">Secciones</a></p>
			</div>

			<div class="panel panel-default col-xs-12">
				<h2 class="">Módulo de solicitudes de sala</h2>
				<p><a class="btn btn-lg btn-default col-xs-6" href="index.php?r=solicitud-asignacion/index">Solicitudes de asignación</a></p>
				<p><a class="btn btn-lg btn-default col-xs-6" href="index.php?r=solicitud-cambio/index">Solicitudes de cambio</a></p>
				<p><a class="btn btn-lg btn-default col-xs-6" href="index.php?r=solicitud-cancelacion/index">Solicitudes de cancelación</a></p>
				<p><a class="btn btn-lg btn-default col-xs-6" href="index.php?r=post-de-denuncia/index">Denuncia de mal uso</a></p>
			</div>

			<div class="panel panel-default col-xs-12">
				<h2 class="">Módulo de tipos</h2>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=estado-solicitud-asignacion/index">Estados asignaciones</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=estado-solicitud-cambio/index">Estados cambios</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=estado-solicitud-cancelacion/index">Estado cancelación</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=tipo-denuncia/index">Tipos de denuncia</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=tipo-sala/index">Tipos de sala</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=dia/index">Días hábiles</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=tiempo-inicio/index">Inicios de hora de clase</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=rol/index">Roles</a></p>
			</div>

			<div class="panel panel-default col-xs-12">
				<h2 class="">Módulo de respaldo</h2>
				<p><a class="btn btn-lg btn-default col-xs-4" href="index.php?r=site/respaldo">Exportar base de datos</a></p>
				<p><a class="btn btn-lg btn-default col-xs-4" href="#">Importar base de datos</a></p>
			</div>


		</div>
	</div>