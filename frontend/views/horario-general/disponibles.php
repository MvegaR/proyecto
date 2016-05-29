<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BloqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas disponibles';
$this->params['breadcrumbs'][] = ['label' => 'Horario General', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
    <?php foreach($result as $row): ?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="Click para Solicitar">
                        <p>Sala <?= $row->ID_SALA ?></p>
                        <p>Edificio <?= $row->ID_EDIFICIO ?></p>
                        <p>Capacidad <?= $row->CAPACIDAD_SALA ?></p>
                    </button>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Solicitar esta sala</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
</div>