<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Sala;
use frontend\models\PostSalafrontend;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Bloque;
use frontend\models\TiempoInicio;
use frontend\models\Dia;
/**
 * SalaController implements the CRUD actions for Sala model.
 */
class SalaController extends Controller
{

    public function actionLista()
    {
        return $this -> render("lista");
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['POST'],
        ],
        ],
        ];
    }

    /**
     * Lists all Sala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSalafrontend();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Sala model.
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
     * Creates a new Sala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sala();
        if($model->load(Yii::$app->request->post())){
            if($model -> ID_TIPO_SALA == ''){
                $model -> ID_TIPO_SALA = null;
            }
            if($model -> ID_EDIFICIO == ''){
                $model -> ID_EDIFICIO = null;
            }
            if ($model->save()) {
                $dias = new dia;
                $tiempoInicio = new tiempoInicio;
                foreach($dias -> find() -> all() as $dia){
                    foreach($tiempoInicio -> find() -> all() as $tiempo){
                        $bloques = new bloque;
                        $bloques -> ID_SALA = $model -> ID_SALA;
                        $bloques -> ID_SECCION = null;
                        $bloques -> BLOQUE_SIGUIENTE = null;
                        $bloques -> ID_DIA = $dia -> ID_DIA;
                        $bloques -> INICIO = $tiempo -> TIEMPO;
                        $bloques -> TERMINO = date("H:i:s", strtotime($tiempo -> TIEMPO) + 40*60);
                        $bloques -> save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->ID_SALA]);
            } 
        }

        return $this->render('create', [
            'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing Sala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if($model->load(Yii::$app->request->post())){
            if($model -> ID_TIPO_SALA == ''){
                $model -> ID_TIPO_SALA = null;
            }
            if($model -> ID_EDIFICIO == ''){
                $model -> ID_EDIFICIO = null;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ID_SALA]);
            } 
        }
        return $this->render('update', [
            'model' => $model,
            ]);
        
    }

    /**
     * Deletes an existing Sala model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $bloques = new bloque;
        foreach($bloques -> find() -> where(["ID_SALA" => $id]) -> all() as $bloque){
            $bloque -> delete();
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Sala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sala::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    //id es el id del edificio (select dependientes)
    public function actionLists($id){
        $contadorSalas = Sala::find()->where(['ID_EDIFICIO' => $id])->count();
        $salas = Sala::find()->where(['ID_EDIFICIO' => $id])->all();

        if($contadorSalas > 0){
            foreach ($salas as $sala) {
                echo "<option value='".$sala->ID_SALA."'> ".$sala->ID_SALA."</option>";
            }
        }else{
         echo "<option value=>Sin salas</option>";
     }
 }
 //tipo es el id de tipo de sala y cap es la capacidad de la sala minima.
 public function actionListscaptipo($tipo, $cap){
    //aqui falta un codigo bonito... :3
    echo "<option>Tipo es $tipo y capacidad es $cap</option>";
 }

}
