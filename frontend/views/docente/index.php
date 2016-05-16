<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use frontend\models\Rol;
use frontend\models\Facultad;

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

        <?= Html::a('Ingresar Docente', ['create'], ['class' => 'btn btn-success']) ?>

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
                'attribute' => 'ID_FACULTAD',
                'value' => 'iDFACULTAD.NOMBRE_FACULTAD', 
                'filter' => 
                Html::activeDropDownList($searchModel, 'ID_FACULTAD', 
                    ArrayHelper::map(Facultad::find()->asArray()->all(),'ID_FACULTAD', 'NOMBRE_FACULTAD'), ['class' => 'form-control','prompt' => 'Seleccione una facultad']),
            ],
            'NOMBRE_DOCENTE',
            'EMAIL:email',
            'USER',
            'PASSWORD',
            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
    </div>
</div>
