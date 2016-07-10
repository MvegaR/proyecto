<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SolicitudAsignacionTemporal;
use frontend\models\SolicitudAsignacionTemporalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\TiempoInicio;
use frontend\models\Bloque;
use frontend\models\Dia;

/**
 * SolicitudAsignacionTemporalController implements the CRUD actions for SolicitudAsignacionTemporal model.
 */
class SolicitudAsignacionTemporalController extends Controller
{
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
     * Lists all SolicitudAsignacionTemporal models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermisosController::permisoAdministrador();
        $searchModel = new SolicitudAsignacionTemporalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SolicitudAsignacionTemporal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         PermisosController::permisoAdminDocente();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SolicitudAsignacionTemporal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         PermisosController::permisoAdminDocente();
        $model = new SolicitudAsignacionTemporal();
        
        if ($model->load(Yii::$app->request->post()) ) {

            $fechadividida = explode("-", $model -> FECHA_ASIGNACION_TEMPORAL);
            $nombreDia = date("l",mktime(0,0,0,intval($fechadividida[1]), intval($fechadividida[2]), intval($fechadividida[0]))); 
            if($nombreDia == "Monday"){
                $nombreDia = "Lunes";
            }else if($nombreDia == "Tuesday"){
                $nombreDia = "Martes";
            }else if($nombreDia == "Wednesday"){
                $nombreDia = "Miércoles";
            }else if($nombreDia == "Thursday"){
                $nombreDia = "Jueves";
            }else if($nombreDia == "Friday"){
                $nombreDia = "Viernes";
            }else if($nombreDia == "Saturday"){
                $nombreDia = "Sábado";
            }else if($nombreDia == "Sunday"){
                $nombreDia = "Domingo";
            }
            $idDia = Dia::find() -> where(["NOMBRE" => $nombreDia]) -> one() -> ID_DIA;
          
            $var = true;
            $bloques = Bloque::find() -> where(["ID_SALA" => $model -> SALA_ASIGNACION_TEMPORAL, "ID_DIA" => $idDia]) 
            -> orderBy("INICIO") -> all();

            $comenzar = false;
            $i = 0;
            $idPadre = null;
            foreach ($bloques as $bloque) {
               if($bloque -> ID_BLOQUE == $model -> INICIO_BLOQUE_ASIGNACION_TEMPORAL){
                   $comenzar = true;
               }
              
                if($comenzar && $i < $model -> CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL  && $var && ($var = $model -> save()) ){
                   
                    if($idPadre == null){
                        $idPadre = Yii::$app->db->getLastInsertID();
                        $model = $this -> findModel($idPadre);
                        $model -> SOLICITUD_TEMPORAL_PADRE = $idPadre;
                        if(!$model -> save()){
                            echo "Error";
                            var_dump($model);
                            return;
                        }

                    }
                    $model = new SolicitudAsignacionTemporal();
                    $model->load(Yii::$app->request->post());
                    $model -> INICIO_BLOQUE_ASIGNACION_TEMPORAL = $bloque -> ID_BLOQUE;
                    $model -> SOLICITUD_TEMPORAL_PADRE = $idPadre;
                     $i++;
                
                   
                }
                

           }

           if($var){
             return $this->redirect(['view', 'id' => $idPadre]);
            }
            else{
                echo "No se guardo algo... D:<br>";
                echo "<hr>";
                echo var_dump($model);
                echo "<hr>";
                echo var_dump(Yii::$app->request->post());
                die;
              }
    } else {
        return $this->render('create', [
            'model' => $model,
            ]);
    }
}

    /**
     * Updates an existing SolicitudAsignacionTemporal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model1 = $this->findModel($id);
        $model = $this -> findModel($model1->SOLICITUD_TEMPORAL_PADRE);

        if ($model->load(Yii::$app->request->post())) {
           $this->actionDelete($id, false);
           $this->actionCreate();
        } else {    
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SolicitudAsignacionTemporal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id, $r = true)
    {
        PermisosController::permisoAdministrador();
        $model1 = $this->findModel($id);
        $model = $this -> findModel($model1->SOLICITUD_TEMPORAL_PADRE);
        $model = SolicitudAsignacionTemporal::find() -> where(["SOLICITUD_TEMPORAL_PADRE" => $model1->SOLICITUD_TEMPORAL_PADRE]) -> all();
        foreach ($model as $mod) {
            $mod -> delete();
        }

        if($r){return $this->redirect(['index']);}
    }

    /**
     * Finds the SolicitudAsignacionTemporal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SolicitudAsignacionTemporal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SolicitudAsignacionTemporal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
