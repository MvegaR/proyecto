<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Docente;
use frontend\models\DocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CambiosController implements the CRUD actions for Docente model.
 */
class CambiosController extends Controller
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
     * Lists all Docente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Docente model.
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
     * Creates a new Docente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Docente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_DOCENTE]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Docente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $id = Yii::$app -> user -> identity -> ID_DOCENTE;
        $model = $this->findModel($id);
        $model -> PASSWORD_REPEAT = $model -> PASSWORD;
        if ($model->load(Yii::$app->request->post())) {
            if($model -> USER == ''){
                 return $this->render('update', [
                'model' => $model,'error' => "No puede cambiar su nombre de usuario a vacio"
                ]);
            }
            $model -> PASSWORD = sha1($model -> PASSWORD);
            $model -> PASSWORD_REPEAT = sha1($model -> PASSWORD_REPEAT);
            //return $this->redirect(['view', 'id' => $model->ID_DOCENTE]);
        if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID_DOCENTE]);
            } 

        } 
         
        return $this->render('update', [
                'model' => $model,
            ]);
        
    }

   

    /**
     * Deletes an existing Docente model.
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
     * Finds the Docente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Docente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Docente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
