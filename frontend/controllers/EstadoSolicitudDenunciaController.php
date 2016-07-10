<?php

namespace frontend\controllers;

use Yii;
use frontend\models\EstadoSolicitudDenuncia;
use frontend\models\EstadoSolicitudDenunciaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoSolicitudDenunciaController implements the CRUD actions for EstadoSolicitudDenuncia model.
 */
class EstadoSolicitudDenunciaController extends Controller
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
     * Lists all EstadoSolicitudDenuncia models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermisosController::permisoAdministrador();
        $searchModel = new EstadoSolicitudDenunciaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstadoSolicitudDenuncia model.
     * @param integer $id
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
     * Creates a new EstadoSolicitudDenuncia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        PermisosController::permisoAdministrador();
        $model = new EstadoSolicitudDenuncia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_ESTADO_DENUNCIA]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EstadoSolicitudDenuncia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_ESTADO_DENUNCIA]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstadoSolicitudDenuncia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        PermisosController::permisoAdministrador();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstadoSolicitudDenuncia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EstadoSolicitudDenuncia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EstadoSolicitudDenuncia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
