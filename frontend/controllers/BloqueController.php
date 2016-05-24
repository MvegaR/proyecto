<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bloque;
use frontend\models\Dia;
use frontend\models\Sala;
use frontend\models\BloqueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BloqueController implements the CRUD actions for Bloque model.
 */
class BloqueController extends Controller
{
    public function actionPostDeBloque(){

        $model = new Bloque();
        $msg = null;

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                // form inputs are valid, do something here

                $msg = '<div class="alert alert-success" role="alert">
                <strong>Enviada</strong> - La peticion fue enviada con exito!
            </div>';

            return $this->render('post-de-bloque', [

                'model' => $model,
                'msg' => $msg,

                ]);

        }

    }

    return $this->render('post-de-bloque', [

        'model' => $model,
        'msg' => $msg,

        ]);

}

public function behaviors()
{
    return [
    'verbs' => [
    'class' => VerbFilter::className(),
    'actions' => [
    'delete' => ['post'],
    ],
    ],
    ];
}

    /**
     * Lists all Bloque models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BloqueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Bloque model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new Bloque model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bloque();

        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_DIA == ''){
                $model -> ID_DIA = null;
            }
            if($model -> ID_SALA == ''){
                $model -> ID_SALA = null;
            }
            if($model -> ID_SECCION == ''){
                $model -> ID_SECCION = null;
            }
            if($model -> BLOQUE_SIGUIENTE == ''){
                $model -> BLOQUE_SIGUIENTE = null;
            }
            if($model->save()){
               return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
           }
       } 

       return $this->render('create', [
        'model' => $model,
        ]);
   }

    /**
     * Updates an existing Bloque model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_DIA == ''){
                $model -> ID_DIA = null;
            }
            if($model -> ID_SALA == ''){
                $model -> ID_SALA = null;
            }
            if($model -> ID_SECCION == ''){
                $model -> ID_SECCION = null;
            }
            if($model -> BLOQUE_SIGUIENTE == ''){
                $model -> BLOQUE_SIGUIENTE = null;
            }
            if($model->save()){
               return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
           }
       } 
            return $this->render('update', [
                'model' => $model,
                ]);
        
    }

    /**
     * Deletes an existing Bloque model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bloque model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bloque the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bloque::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //id es el id de la sala (select dependientes)
    public function actionLists($id){
        $contadorbloques = Bloque::find()->where(['ID_SALA' => $id])->count();
        $bloques = Bloque::find()->where(['ID_SALA' => $id])->all();
        if($contadorbloques > 0){
            foreach ($bloques as $bloque) {
                $dia = (Dia::find()-> where(['ID_DIA' => $bloque -> ID_DIA])-> one());
                $dia = $dia -> NOMBRE;
                echo "<option value='".$bloque->ID_BLOQUE."'> $dia - Tiempo: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
            }
        }else{
         echo "<option value=>Sin bloques para la sala seleccionada</option>";
     }
    }
    //id es el id de la seccion para entregar las opciones de las salas.
    public function actionLists2($id){
        $contadorbloques = Bloque::find()->where(['ID_SECCION' => $id])->count();
        $bloques = Bloque::find()->where(['ID_SECCION' => $id])->all();
        if($contadorbloques > 0){
            foreach ($bloques as $bloque) {
                $sala = (Sala::find()-> where(['ID_SALA' => $bloque -> ID_SALA])-> one());
                $sala = $sala -> ID_SALA;
                echo "<option value='".$sala."'>$sala</option>";
            }
        }else{
         echo "<option value=>Sin salas para la seccion selecionada</option>";
     }
    }

     //id es el id de la seccion para entregar las opciones de los bloques.
    public function actionLists3($id){
        $contadorbloques = Bloque::find()->where(['ID_SECCION' => $id])->count();
        $bloques = Bloque::find()->where(['ID_SECCION' => $id])->all();
        if($contadorbloques > 0){
            foreach ($bloques as $bloque) {
                $dia = (Dia::find()-> where(['ID_DIA' => $bloque -> ID_DIA])-> one());
                echo "<option value='".$bloque->ID_BLOQUE."'> $dia - Tiempo: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
            }
        }else{
         echo "<option value=>Sin bloques para la seccion selecionada</option>";
     }
    }
    /*
    Hacer una funcion que escriba las opciones de bloques de una sala dada, que no tenga asignaciones, 
    que no tengan asignaciones temporales para la misma fecha y hora
    */
    public function actionLists4($id){ //nececito, fecha, sala, cantidad de bloques.
        
         echo "<option value=>Sin bloques disponibles para la sala seleccionada</option>"; //culpa bloques permanentes
         echo "<option value=>Sin bloques disponibles para la fecha seleccionada</option>"; //culpa bloques temporales
         echo "<option value=>Sin bloques disponibles para la cantidad de periodos solicitados</option>"; //culpa de las asignaciones permantentes
         echo "<option value=>Sin bloques disponibles para la cantidad de periodos solicitados para la fecha solicitada</option>"; //culpa de las asignaciones temporales.
         echo "<option value=>No existen bloques iniciales que cumpla con la cantidad de periodos ingresado</option>"; //bloques permanentes
         echo "<option value=>No existen bloques iniciales que cumpla con la cantidad de periodos ingresado en la fecha seleccionada</option>"; //los temporales.
         echo "<option value=> </option>"; //opciones validas, debe cumplir que los siguientes X periodos esten libres, del mismo día.
        }
    
}