<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bloque;
use frontend\models\Dia;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
                echo "<option value='ID: ".$bloque->ID_BLOQUE."'> ".$bloque->ID_BLOQUE." - $dia - Periodo: ".$bloque->INICIO." - ".$bloque->TERMINO."</option>";
            }
        }else{
           echo "<option>Sin bloques</option>";
       }
   }
}
