<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use frontend\models\SubirArchivo;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AsignaturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Asignatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class= "table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ASIGNATURA',
            'ID_CARRERA',
            'NOMBRE_ASIGNATURA',
            'ANIO',
            'SEMESTRE',            
            'HORAS_TEO', 
            'HORAS_LAB_COM', 
            'HORAS_AYUDANTIA', 
            'HORAS_LAB_FISICA', 
            'HORAS_LAB_QUIMICA', 
            'HORAS_LAB_ROBOTICA', 
            'HORAS_LAB_MECANICA', 
            'HORAS_TALLER_ARQUITECTURA', 
            'HORAS_TALLER_MADERA', 
            'HORAS_GYM', 
            'HORAS_AUDITORIO', 

            ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
        </div>
        <div class="col-ls-12 col-md-6">

        <?php
        echo '<div><label class="control-label">Exportar a archivo</label></div>';
        $gridColumns = [
        
        'ID_ASIGNATURA',
        'ID_CARRERA',
        'NOMBRE_ASIGNATURA',
        'SEMESTRE',            
        'HORAS_TEO', 
        'HORAS_LAB_COM', 
        'HORAS_AYUDANTIA', 
        'HORAS_LAB_FISICA', 
        'HORAS_LAB_QUIMICA', 
        'HORAS_LAB_ROBOTICA', 
        'HORAS_LAB_MECANICA', 
        'HORAS_TALLER_ARQUITECTURA', 
        'HORAS_TALLER_MADERA', 
        'HORAS_GYM', 
        'HORAS_AUDITORIO', 

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
