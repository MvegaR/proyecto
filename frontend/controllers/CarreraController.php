<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Carrera;
use frontend\models\CarreraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarreraController implements the CRUD actions for Carrera model.
 */
class CarreraController extends Controller
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
     * Lists all Carrera models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermisosController::permisoAdministrador();
        $searchModel = new CarreraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Carrera model.
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
     * Creates a new Carrera model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        PermisosController::permisoAdministrador();
        $model = new Carrera();

        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_FACULTAD == ''){
                $model -> ID_FACULTAD = null;
            }
            if($model->save())
                return $this->redirect(['view', 'id' => $model->ID_CARRERA]);
        }

        return $this->render('create', [
            'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Carrera model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model -> ID_FACULTAD == ''){
                $model -> ID_FACULTAD = null;
            }
            if($model->save())
                return $this->redirect(['view', 'id' => $model->ID_CARRERA]);
        }
        return $this->render('update', [
            'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing Carrera model.
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
     * Finds the Carrera model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Carrera the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carrera::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
