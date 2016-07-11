<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Asignatura;
use frontend\models\AsignaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsignaturaController implements the CRUD actions for Asignatura model.
 */
class AsignaturaController extends Controller
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
     * Lists all Asignatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermisosController::permisoAdministrador();
        $searchModel = new AsignaturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Asignatura model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {

        PermisosController::permisoAdministrador();
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new Asignatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        PermisosController::permisoAdministrador();
        $model = new Asignatura();
        
        if($model->load(Yii::$app->request->post())){
            if($model -> ID_CARRERA == ''){
                $model -> ID_CARRERA = NULL;
            }
            if ($model->save()) {
               return $this->redirect(['view', 'id' => $model->ID_ASIGNATURA]);
           } 
       }
       return $this->render('create', [
        'model' => $model,
        ]);

   }

    /**
     * Updates an existing Asignatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post())){
            if($model -> ID_CARRERA == ''){
                $model -> ID_CARRERA = NULL;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID_ASIGNATURA]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing Asignatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        PermisosController::permisoAdministrador();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Asignatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asignatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function actionLists($carrera){
        $contador = 0;
      foreach (Asignatura::find() -> all() as $asignatura) {
          if($asignatura -> ID_CARRERA == $carrera){
            echo "<option value= '". $asignatura -> ID_ASIGNATURA."'>". $asignatura -> NOMBRE_ASIGNATURA."</option>";
            $contador++;
          }
      }
      if($contador == 0){
         echo "<option value= ''>Carrera sin asignaturas ingresadas</option>";
      }
    }




}
