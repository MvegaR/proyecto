<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SolicitudAsignacion;
use frontend\models\Bloque;
use frontend\models\SolicitudAsignacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudAsignacionController implements the CRUD actions for SolicitudAsignacion model.
 */
class SolicitudAsignacionController extends Controller
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
     * Lists all SolicitudAsignacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitudAsignacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SolicitudAsignacion model.
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
     * Creates a new SolicitudAsignacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SolicitudAsignacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           $bloqueInicial =  Bloque::find()->where(["ID_BLOQUE" => $model -> INICIO_BLOQUE_ASIGNACION]) -> one();
            $bloquesDisponibles = Bloque::find()->where(["ID_SALA" => $model->SALA_ASIGNACION, "ID_DIA" => $bloqueInicial-> ID_DIA, "ID_SECCION" => null]) -> orderBy("INICIO")->all();
            $pos = array_search($bloqueInicial, $bloquesDisponibles);
            for($i = 0; $i < $model->CANTIDAD_BLOQUES_ASIGNACION; $i++){
                $bloquesDisponibles[$pos + $i] -> ID_SECCION = $model -> SECCION_ASIGNACION;
                if($i < $model->CANTIDAD_BLOQUES_ASIGNACION - 1){
                    $bloquesDisponibles[$pos + $i] -> BLOQUE_SIGUIENTE = $bloquesDisponibles[$pos + 1 + $i] -> ID_BLOQUE;
                }
                $bloquesDisponibles[$pos + $i] -> save();
            }
            return $this->redirect(['view', 'id' => $model->ID_ASIGNACION]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SolicitudAsignacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_ASIGNACION]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SolicitudAsignacion model.
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
     * Finds the SolicitudAsignacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SolicitudAsignacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SolicitudAsignacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
