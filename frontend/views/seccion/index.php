<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use frontend\models\Docente;
use frontend\models\Asignatura;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Secciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear seccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_SECCION',
            //'ID_DOCENTE'
            [
                'attribute' => 'ID_DOCENTE',
                'value' => 'iDDOCENTE.NOMBRE_DOCENTE',  
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_DOCENTE', 
                    ArrayHelper::map(Docente::find()->asArray()->all(),'ID_DOCENTE', 'NOMBRE_DOCENTE'), ['class' => 'form-control','prompt' => 'Seleccione un docente']),//atributos html del selector
            ]
            ,
            //'ID_ASIGNATURA'
            [
                'attribute' => 'ID_ASIGNATURA',
                'value' => 'iDASIGNATURA.NOMBRE_ASIGNATURA',  
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_ASIGNATURA', 
                    ArrayHelper::map(Asignatura::find()->asArray()->all(),'ID_ASIGNATURA', 'NOMBRE_ASIGNATURA'), ['class' => 'form-control','prompt' => 'Seleccione un asignatura']),//atributos html del selector
            ],
            'CUPO',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


        <div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
            'ID_SECCION',
            'ID_DOCENTE',
            'ID_ASIGNATURA',
            'CUPO',

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
