<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TiempoInicio;
use frontend\models\TiempoInicioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Dia;
use frontend\models\Sala;
use frontend\models\Bloque;


/**
 * TiempoInicioController implements the CRUD actions for TiempoInicio model.
 */
class TiempoInicioController extends Controller
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
     * Lists all TiempoInicio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TiempoInicioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TiempoInicio model.
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
     * Creates a new TiempoInicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TiempoInicio();

        if ($model->load(Yii::$app->request->post())) {
            $dias = Dia::find() -> all();
            $salas = Salas::find() -> all();
            foreach ($salas as $sala) {
                foreach ($dias as $dia) {
                    $bloque = new Bloque();
                    $bloque -> ID_DIA = $dia-> ID_DIA;
                    $bloque -> ID_SALA = $sala -> ID_SALA;
                    $bloque -> SECCION = null;
                    $bloque -> INICIO = $model -> TIEMPO;
                    $bloque -> TERMINO = date("H:i:s", strtotime($model -> TIEMPO) + 40*60);
                    $bloque -> BLOQUE_SIGUIENTE = null;
                    $bloque -> save();

                }
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->TIEMPO]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TiempoInicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $bloques = Bloque::find()-> where(['INICIO' => $model -> TIEMPO]) -> all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach ($bloques as $bloque) {
                    $bloque -> INICIO = $model -> TIEMPO;
                    $bloque -> TERMINO = date("H:i:s", strtotime($model -> TIEMPO) + 40*60);
                    $bloque -> save();
            }
            return $this->redirect(['view', 'id' => $model->TIEMPO]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TiempoInicio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $bloques = Bloque::find()-> where(['INICIO' => $this->findModel($id) -> TIEMPO]) -> all();
        $this->findModel($id)->delete();
        foreach ($bloques as $bloque) {
            $bloque -> delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the TiempoInicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TiempoInicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TiempoInicio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
