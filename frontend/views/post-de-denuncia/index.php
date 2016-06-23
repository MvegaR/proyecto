<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
use frontend\models\PostDeDenuncia;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostDeDenunciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reportes de sala';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-de-denuncia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear reporte de sala', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DENUNCIA',
            'ID_TIPO_DENUNCIA',
            'ID_ESTADO_DENUNCIA',
            'FACULTAD_DENUNCIA',
            'EDIFICIO_DENUNCIA',
            'SALA_DENUNCIA',
            'BLOQUE_DENUNCIA',
            'FECHA_DENUNCIA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


        <div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
            'ID_DENUNCIA',
            'ID_TIPO_DENUNCIA',
            'ID_ESTADO_DENUNCIA',
            'FACULTAD_DENUNCIA',
            'EDIFICIO_DENUNCIA',
            'SALA_DENUNCIA',
            'BLOQUE_DENUNCIA',
            'FECHA_DENUNCIA',

        ];
$query = PostDeDenuncia::find();
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
