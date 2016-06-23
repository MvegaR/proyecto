<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Facultad;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
use frontend\models\Carrera;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarreraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Carrera', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_CARRERA',
            //'ID_FACULTAD'
            [
                'attribute' => 'ID_FACULTAD',
                'value' => 'iDFACULTAD.NOMBRE_FACULTAD',
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_FACULTAD', 
                    ArrayHelper::map(Facultad::find()->asArray()->all(),'ID_FACULTAD', 'NOMBRE_FACULTAD'), ['class' => 'form-control','prompt' => 'Seleccione un facultad']),//atributos html del selector
            ],
            'NOMBRE_CARRERA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<div class="col-ls-12 col-md-6">

        <?php
echo '<div><label class="control-label">Exportar a archivo</label></div>';
$gridColumns = [
    'ID_CARRERA',
    'ID_FACULTAD',
    'NOMBRE_CARRERA',
];
$query = Carrera::find();
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
