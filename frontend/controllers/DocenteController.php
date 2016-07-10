<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Docente;
use frontend\models\DocenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocenteController implements the CRUD actions for Docente model.
 */
class DocenteController extends Controller
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
        PermisosController::permisoAdministrador();
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
        PermisosController::permisoAdministrador();
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
        PermisosController::permisoAdministrador();
        $model = new Docente();
        if($model->load(Yii::$app->request->post()) ){
            if($model -> PASSWORD != null || $model -> PASSWORD != '') {$model -> PASSWORD = sha1($model -> PASSWORD);  $model -> PASSWORD_REPEAT = sha1($model -> PASSWORD);}
            if($model -> ID_ROL == ''){
                $model -> ID_ROL = null;
            }
            if($model -> ID_FACULTAD == ''){
                $model -> ID_FACULTAD = null;
            }
            if($model -> EMAIL == ''){
                $model -> EMAIL = null;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID_DOCENTE]);
            } 
        }
        
        return $this->render('create', [
            'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Docente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) ){
            if($model -> PASSWORD != null || $model -> PASSWORD != '') {
                $model -> PASSWORD = sha1($model -> PASSWORD);
                $model -> PASSWORD_REPEAT = sha1($model -> PASSWORD_REPEAT);
            }
            if($model -> ID_ROL == ''){
                $model -> ID_ROL = null;
            }
            if($model -> ID_FACULTAD == ''){
                $model -> ID_FACULTAD = null;
            }
            if($model -> EMAIL == ''){
                $model -> EMAIL = null;
            }
            if($model -> USER == ''){
                 return $this->render('update', [
                'model' => $model,'error' => "No puede cambiar su nombre de usuario a vacio"
                ]);
            }
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
        PermisosController::permisoAdministrador();
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
