<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\TipoSala;
use yii\widgets\ActiveForm;
use frontend\models\SubirArchivo;
use frontend\models\Sala;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSalafrontend */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sala-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Sala', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_SALA',
            //'ID_TIPO_SALA'
            [
                'attribute' => 'ID_TIPO_SALA',
                'value' => 'iDTIPOSALA.NOMBRE_TIPO',  
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_TIPO_SALA', 
                    ArrayHelper::map(TipoSala::find()->asArray()->all(),'ID_TIPO_SALA', 'NOMBRE_TIPO'), ['class' => 'form-control','prompt' => 'Seleccione un tipo de sala']),//atributos html del selector
            ],
            'ID_EDIFICIO',
            'CAPACIDAD_SALA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
                'ID_SALA',
                'ID_TIPO_SALA',
                'ID_EDIFICIO',
                'CAPACIDAD_SALA',

        ];
$query = Sala::find();
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
