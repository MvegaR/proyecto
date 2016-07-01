<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Seccion;
use frontend\models\Asignatura;
use frontend\models\SeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeccionController implements the CRUD actions for Seccion model.
 */
class SeccionController extends Controller
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
     * Lists all Seccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Seccion model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new Seccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seccion();

        if ($model->load(Yii::$app->request->post())) {
            if($model->ID_DOCENTE == ''){
                $model->ID_DOCENTE = null;
            }
            if($model->ID_ASIGNATURA == ''){
                $model->ID_ASIGNATURA = null;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID_SECCION]);
            }
        } 
        return $this->render('create', [
            'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Seccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->ID_DOCENTE == ''){
                $model->ID_DOCENTE = null;
            }
            if($model->ID_ASIGNATURA == ''){
                $model->ID_ASIGNATURA = null;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID_SECCION]);
            }
        } 
        return $this->render('update', [
            'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing Seccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Seccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seccion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //entrega las secciones de una asignatura asociadas a un determinado docente (usuario conectado)
    public function actionLists($id){
        if(!Yii::$app -> user -> isGuest){
            $totalSecciones = Seccion::find() -> 
                where(['ID_ASIGNATURA' => $id, 'ID_DOCENTE' => Yii::$app -> user -> identity -> ID_DOCENTE]) -> count();
            $secciones =  Seccion::find() -> 
                where(['ID_ASIGNATURA' => $id, 'ID_DOCENTE' => Yii::$app -> user -> identity -> ID_DOCENTE]) -> all();
             echo "<option value=>Seleccione una seccion</option>";
            foreach($secciones as $seccion){
                echo "<option value='".$seccion -> ID_SECCION."'> ".$seccion -> ID_SECCION."</option>";
            }
            if($totalSecciones == 0){
                echo "<option value=>Ud. no tiene secciones de tal asignatura</option>";
            }
        }
    }
    //entrega la capacidad de una seccion
    public function actionLists2($id){
        echo Seccion::find()->where(["ID_SECCION"=>$id])->one()-> CUPO;
    }
}
