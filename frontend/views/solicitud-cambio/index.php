<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SolicitudCambioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Cambio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-cambio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Solicitud Cambio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CAMBIO',
            'ID_ESTADO_CAMBIO',
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'SALA_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
            'ID_CAMBIO',
            'ID_ESTADO_CAMBIO',
            'ASIGNATURA_CAMBIO',
            'SECCION_CAMBIO',
            'SALA_CAMBIO',
            'DOCENTE_CAMBIO',
            'CAPACIDAD_CAMBIO',

        ];

// Renders a export dropdown menu
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'target' => '_self'
            ]);

            ?>
</div>
<div class="col-ls-12 col-md-6">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => 'index.php?r=site/importar-excel&nombretabla='.$_GET['r']]) ?>

    <?= $form->field(new SubirArchivo, 'file')->fileInput(["class" => "btn btn-default"]) 
    -> label("Importar desde excel") ?>

    <button class="btn btn-success">Importar</button>

<?php ActiveForm::end() ?>
</div>

</div>
