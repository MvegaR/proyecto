<?php
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\Sala;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<div class="jumbotron">
    <h3><?= $titulo ?></h3>
</div>
    <?php foreach($salas as $row): ?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="btn-group">
                    <a href=<?= Url::toRoute(["sala/horario-sala", "sala" => $row->ID_SALA])?> class="btn btn-default" role="button" title="Click para ver horario">
                        <p>Sala <?= $row->ID_SALA ?></p>
                        <p>Capacidad <?= $row->CAPACIDAD_SALA ?></p>
                    </a>
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href=<?= Url::toRoute(["sala/horario-sala", "sala" => $row->ID_SALA])?>>Ver horario</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
