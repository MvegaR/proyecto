<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Dia;
use frontend\models\DiaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\TiempoInicio;
use frontend\models\Sala;
use frontend\models\Bloque;


/**
 * DiaController implements the CRUD actions for Dia model.
 */
class DiaController extends Controller
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
     * Lists all Dia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dia model.
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
     * Creates a new Dia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dia();

        if ($model->load(Yii::$app->request->post())) {
            $salas = Sala::find()->all();
            $tiempos = TiempoInicio::find()->all();
            foreach ($salas as $sala) {
                foreach ($tiempos as $tiempo) {
                    $bloque = new Bloque();
                    $bloque -> ID_DIA = $model -> ID_DIA;
                    $bloque -> ID_SALA = $sala -> ID_SALA;
                    $bloque -> ID_SECCION = null;
                    $bloque -> INICIO = $tiempo -> TIEMPO;
                    $bloque -> TERMINO = date("H:i:s", strtotime($tiempo -> TIEMPO) + 40*60);
                    $bloque -> BLOQUE_SIGUIENTE = null;
                    $bloque -> save();
                }
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID_DIA]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Dia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DIA]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Dia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $bloques = Bloque::find()-> where(['ID_DIA' => $id]) -> all();
        foreach ($bloques as $bloque) {
            $bloque -> delete();
        }
        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Dia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
