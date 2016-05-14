<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Edificio;
use frontend\models\EdificioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EdificioController implements the CRUD actions for Edificio model.
 */
class EdificioController extends Controller
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
     * Lists all Edificio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdificioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Edificio model.
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
     * Creates a new Edificio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Edificio();

        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_EDIFICIO == ''){
                $model -> ID_EDIFICIO = null;
            }
            if($model->save()){
               return $this->redirect(['view', 'id' => $model->ID_EDIFICIO]);
           }
       }
           return $this->render('create', [
            'model' => $model,
            ]);

       }

    /**
     * Updates an existing Edificio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        
        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_EDIFICIO == ''){
                $model -> ID_EDIFICIO = null;
            }
            if($model->save()){
               return $this->redirect(['view', 'id' => $model->ID_EDIFICIO]);
           }
        }
           return $this->render('update', [
            'model' => $model,
            ]);

       }

    /**
     * Deletes an existing Edificio model.
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
     * Finds the Edificio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Edificio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Edificio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
        //Para listas dependientes, $id es el id de la facultad que se envia como parametro.
    public function actionLists($id){
        $contadorEdificios = Edificio::find()->where(['ID_FACULTAD' => $id])->count();
        $edificios = Edificio::find()->where(['ID_FACULTAD' => $id])->all();

        if($contadorEdificios > 0){
            foreach ($edificios as $edificio) {
                echo "<option value='".$edificio->ID_EDIFICIO."'> ".$edificio->NOMBRE_EDIFICIO."</option>";
            }
        }else{
           echo "<option>Sin edificios</option>";
       }
   }
}
