<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
use frontend\models\EstadoSolicitudAsignacion;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstadoSolicitudAsignacionoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados Solicitud Asignacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-solicitud-asignacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Estado Solicitud Asignacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESTADO_SOLICITUD',
            'NOMBRE_ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
        <div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
            'ID_ESTADO_SOLICITUD',
            'NOMBRE_ESTADO',

        ];
$query = EstadoSolicitudAsignacion::find();
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);
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
