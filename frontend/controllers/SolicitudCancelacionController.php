<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SolicitudCancelacion;
use frontend\models\Bloque;
use frontend\models\SolicitudCancelacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudCancelacionController implements the CRUD actions for SolicitudCancelacion model.
 */
class SolicitudCancelacionController extends Controller
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
     * Lists all SolicitudCancelacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermisosController::permisoAdministrador();
        $searchModel = new SolicitudCancelacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SolicitudCancelacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         PermisosController::permisoAdminDocente();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SolicitudCancelacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         PermisosController::permisoAdminDocente();
        $model = new SolicitudCancelacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $bloqueDado = Bloque::find()->where(["ID_BLOQUE" => $model -> BLOQUE_CANCELACION]) ->one();
            while($bloqueDado != null){
                $bloqueDado -> ID_SECCION = null;
                if($bloqueDado -> BLOQUE_SIGUIENTE != null){
                     $aux = $bloqueDado -> BLOQUE_SIGUIENTE;
                     $bloqueDado -> BLOQUE_SIGUIENTE = null;
                     $bloqueDado -> save();
                     $bloqueDado = Bloque::find()->where(["ID_BLOQUE" => $aux]) ->one();
                 }else{
                    $bloqueDado -> save();
                    $bloqueDado = null;
                 }
            }
            return $this->redirect(['view', 'id' => $model->ID_CANCELACION]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SolicitudCancelacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermisosController::permisoAdministrador();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->ID_CANCELACION]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SolicitudCancelacion model.
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
     * Finds the SolicitudCancelacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SolicitudCancelacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SolicitudCancelacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
