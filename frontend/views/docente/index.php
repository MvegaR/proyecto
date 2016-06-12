<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Rol;
use frontend\models\Facultad;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a('Crear Docente', ['create'], ['class' => 'btn btn-success']) ?>

    </p>
    <div class= "table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DOCENTE',
            //'ID_ROL',
            [
                'attribute' => 'ID_ROL',
                'value' => 'iDROL.NOMBRE_ROL', // iDROL llama a la funcion GETIDROL del modelo Docente-php 
                //(inviernte la primera letra del nombre de la funcion) 
                //y entrega una fila de rol y accedemos a su nombre. 
                'filter' => //funcionalidad del buscador.
                Html::activeDropDownList($searchModel, 'ID_ROL', 
                    ArrayHelper::map(Rol::find()->asArray()->all(),'ID_ROL', 'NOMBRE_ROL'), ['class' => 'form-control','prompt' => 'Seleccione un rol']),//atributos html del selector
            ],
            [
                'attribute' => 'ID_DEPARTAMENTO',
                'value' => 'iDDEPARTAMENTO.NOMBRE_DEPARTAMENTO', 
                'filter' => 
                Html::activeDropDownList($searchModel, 'ID_DEPARTAMENTO', 
                    ArrayHelper::map(Facultad::find()->asArray()->all(),'ID_DEPARTAMENTO', 'NOMBRE_DEPARTAMENTO'), ['class' => 'form-control','prompt' => 'Seleccione un departamento']),
            ],
            'NOMBRE_DOCENTE',
            'EMAIL:email',
            'USER',
            'PASSWORD',
            'COOKIE',
            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>

     
    </div>
    <div class="col-ls-12 col-md-6">
     <?php
echo '<div><label class="control-label">Exportar a archivo</label></div>';
$gridColumns = [
    'ID_DOCENTE',
    'ID_ROL',
    'ID_FACULTAD',
    'NOMBRE_DOCENTE',
    'EMAIL:email',
    'USER',
    'PASSWORD',
    'COOKIE',
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
