<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SolicitudCambio;
use frontend\models\SolicitudCambioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Bloque;

/**
 * SolicitudCambioController implements the CRUD actions for SolicitudCambio model.
 */
class SolicitudCambioController extends Controller
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
     * Lists all SolicitudCambio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SolicitudCambioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SolicitudCambio model.
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
     * Creates a new SolicitudCambio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SolicitudCambio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $sql = "Select * from bloque where ID_SALA = '".$model -> SALA_CAMBIO."' and ID_SECCION = '".$model -> SECCION_CAMBIO."'";
            $bloquesOrigen = Bloque::findBySql($sql) -> all();
            foreach($bloquesOrigen as $bloqueO){
                $sql = "Select * from bloque where ID_SALA = '".$model -> SALA_CAMBIO2."' and ID_SECCION = NULL and ID_DIA = ".$bloqueO -> ID_DIA." and INICIO = '".$bloqueO -> INICIO."'";
                $bloqueD = Bloque::findBySql($sql) -> one();
                $bloqueD -> ID_SECCION = $bloqueO -> ID_SECCION;
                $bloqueD -> BLOQUE_SIGUIENTE = $bloqueO -> BLOQUE_SIGUIENTE;
                $bloqueO -> ID_SECCION = null;
                $bloqueO -> BLOQUE_SIGUIENTE = null;
                $bloqueD -> save();
                $bloqueO -> save();
            }
            return $this->redirect(['view', 'id' => $model->ID_CAMBIO]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SolicitudCambio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_CAMBIO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SolicitudCambio model.
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
     * Finds the SolicitudCambio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SolicitudCambio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SolicitudCambio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
