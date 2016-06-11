<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Departamento;
use frontend\models\Facultad;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FacultadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facultades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Facultad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_FACULTAD',
            [
                'attribute' => 'ID_DEPARTAMENTO',
                'value' => 'iDDEPARTAMENTO.NOMBRE_DEPARTAMENTO',  
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_DEPARTAMENTO', 
                    ArrayHelper::map(Departamento::find()->asArray()->all(),'ID_DEPARTAMENTO', 'NOMBRE_DEPARTAMENTO'), ['class' => 'form-control','prompt' => 'Seleccione un departamento']),//atributos html del selector
            ],
            'NOMBRE_FACULTAD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
        <div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
            'ID_FACULTAD',
            'ID_DEPARTAMENTO',
            'NOMBRE_FACULTAD',

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
