
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use frontend\models\Carrera;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Horario alumno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Seccion-index">

<form class="form-inline" role="form" action='
	index.php
 ' method="get">

<?= Html::hiddenInput('r','horario-alumno/index', null, [ 'value' => 'horario-alumno/index','id' => 'r']); ?>

<div class="form-group field-carrera">
<label class="control-label" for="seccion-carrera">Carrera</label>
<?= Html::DropDownList('carrera', null,ArrayHelper::map(Carrera::find()->all(),'ID_CARRERA','NOMBRE_CARRERA'),['class'=>  'form-control','id' => 'carrera']) ; ?>
</div>


<div class="form-group field-anio">
<label class="control-label" for="seccion-anio">Año</label>
<?= Html::Input('number','anio', 1, ['min' => '1' , 'max' => '10', 'value' => '1','id' => 'anio']); ?>
</div>


<div class="form-group field-semestre">
<label class="control-label" for="seccion-semestre">Semestre</label>
<?= Html::Input('number','semestre', 1, ['min' => 1 , 'max' => 10, 'value' => 1,'id' => 'semestre']); ?>
</div>
<button type="submit" class="btn btn-success">Abrir horario</button>
</form>

</div>