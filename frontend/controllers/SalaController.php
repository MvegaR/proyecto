<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Sala;
use frontend\models\PostSalafrontend;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Bloque;
use frontend\models\Facultad;
use frontend\models\Edificio;
use frontend\models\TiempoInicio;
use frontend\models\Dia;
/**
 * SalaController implements the CRUD actions for Sala model.
 */
class SalaController extends Controller
{

    public function actionEdificios(){
      $post = Yii::$app->request->post(); 
      $id = $post['id'];
      $edificios = Edificio::find()-> where(["ID_FACULTAD" => $id])->all();
      return $this->renderPartial('edificios', [
            'edificios' => $edificios,
            ]);
    }

    public function actionSalas(){
      $post = Yii::$app->request->post(); 
      $id = $post['id'];
      $salas;
      $titulo = "Seleccione sala";
      if($id == "*") {
        $salas = Sala::find()->all();
      }
      else{
        $titulo = "Paso 3: Seleccione sala";
        $salas = Sala::find()-> where(["ID_EDIFICIO" => $id])->all();
      }
      return $this->renderPartial('salas', [
            'salas' => $salas,
            'titulo' => $titulo,
            ]);
    }

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
      PermisosController::permisoAdministrador();
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
      PermisosController::permisoAdministrador();
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
      PermisosController::permisoAdministrador();
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
      PermisosController::permisoAdministrador();
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
      PermisosController::permisoAdministrador();
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
                echo "<option value='".$sala->ID_SALA."'> ".$sala->ID_SALA." Tipo mueble: ".$sala->MUEBLE." Capacidad: ".$sala->CAPACIDAD_SALA."</option>";
            }
        }else{
         echo "<option value=>Sin salas</option>";
     }
 }
 //tipo es el id de tipo de sala y cap es la capacidad de la sala minima.
 public function actionListscaptipo($tipo, $cap){
        if($tipo == null) $tipo = 0;
        if($cap == null) $cap = 0;
        $contadorSalasTipo = Sala::find()->where(['ID_TIPO_SALA' => $tipo])->count();
        $sqlCap = "Select S.* from sala S where CAPACIDAD_SALA >= $cap";
        $contadorSalasCap = Sala::findBySql($sqlCap)->count();
        $sql = "Select S.* from sala S where CAPACIDAD_SALA >= $cap AND ID_TIPO_SALA = $tipo";
        $contadorSalas = Sala::findBySql($sql)->count();
        $salas = Sala::findBySql($sql)->all();
        if($contadorSalasTipo == 0){
              echo "<option value=>Sin salas del tipo ingresado disponibles</option>";
        }

        else if($contadorSalasCap == 0){
             echo "<option value=>Sin salas con la capacidad ingresada disponible</option>";
        }else if($contadorSalas > 0){
            foreach ($salas as $sala) {
                echo "<option value='".$sala->ID_SALA."'> ".$sala->ID_SALA." Tipo mueble: ".$sala->MUEBLE." Capacidad: ".$sala->CAPACIDAD_SALA."</option>";
            }
        }else{
         echo "<option value=>Sin salas con la capacidad mínima ingresada y tipo, disponibles</option>";
        }
    }


    public function compararBloques($bloquesConocidos, $bloquesDesconocidos){
      $respuestas = [];

      foreach ($bloquesConocidos as $bloqueC) {
        $bloqueComparable = false;
        $sirve = false;
        foreach ($bloquesDesconocidos as $bloqueD) {
          if($bloqueD -> INICIO == $bloqueC -> INICIO && $bloqueD -> ID_DIA == $bloqueC -> ID_DIA ){
            $bloqueComparable = true;
            if($bloqueD->ID_SECCION == null){
              $sirve = true;
            }
            break;
          }
        }
        if($bloqueComparable == true && $sirve == true){
          array_push($respuestas, "true");
        }else if($bloqueComparable == true && $sirve == false){
          array_push($respuestas, "false");
        }
      }
    //  echo var_dump($respuestas);

      foreach ($respuestas as $valor) {
        if($valor === "false"){
          return false;
        }
      }
      return true;
    }


     public function actionListscaptipo2($tipo, $cap, $sala, $sec){
        if($tipo == null) $tipo = 0;
        if($cap == null) $cap = 0;
        $contadorSalasTipo = Sala::find()->where(['ID_TIPO_SALA' => $tipo])->count();
        $sqlCap = "Select S.* from sala S where CAPACIDAD_SALA >= $cap";
        $contadorSalasCap = Sala::findBySql($sqlCap)->count();
        $sql = "Select S.* from sala S where CAPACIDAD_SALA >= $cap AND ID_TIPO_SALA = $tipo";
        $contadorSalas = Sala::findBySql($sql)->count();
        $salas = Sala::findBySql($sql)->all();
        $sql = "Select B.* from bloque B where ID_SALA = '$sala' and ID_SECCION = '$sec'";

        $contadorBloques = Bloque::findBySql($sql) -> count();

        $bloquesOrigen = Bloque::findBySql($sql) -> all();
        if($contadorSalasTipo == 0){
              echo "<option value=>Sin salas del tipo ingresado disponibles</option>";
        }

        else if($contadorSalasCap == 0){
             echo "<option value=>Sin salas con la capacidad ingresada disponible</option>";
        }else if($contadorSalas > 0){
          $contadorSalasFinales = 0;
            foreach ($salas as $sala) {
                $r = $this -> compararBloques($bloquesOrigen, (Bloque::find()->where(["ID_SALA" => $sala->ID_SALA]) -> all()) );
                if($r === true) {
                  echo "<option value='".$sala->ID_SALA."'> ".$sala->ID_SALA." Tipo mueble: ".$sala->MUEBLE." Capacidad: ".$sala->CAPACIDAD_SALA."</option>";
                  $contadorSalasFinales++;
                }
            }
            if($contadorSalasFinales == 0){
              echo "<option value=>Sin salas de cambio disponible con todos los bloques del origen</option>";
            }
        }else{
         echo "<option value=>Sin salas con la capacidad mínima ingresada y tipo, disponibles</option>";
        }
    }

  public function actionHorario(){
      $todosLosDias = Dia::find()-> all();
      $Datos=array();
      foreach ($todosLosDias as $key) {
        $todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia]) -> orderBy("INICIO")->all();
        array_push($Datos, $todosLosBloquesEnOrden);
      }
      return $this->render('HorarioSalas', [
            'Horario' => $Datos
            ]);
  }

    public function actionHorarioSala($sala){
      $datos = [];
      $dias = Dia::find() -> all();
      foreach ($dias as $key) {
        //$todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $key -> ID_DIA])->andWhere(['not',['ID_SECCION' => null]]) -> orderBy("INICIO")->all();
        $todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $key -> ID_DIA])-> orderBy("INICIO")->all();
          array_push($datos,$todosLosBloquesEnOrden);
          //echo $datos[0][0]->ID_BLOQUE;
      }
      //echo $datos[1][0]->ID_BLOQUE;
      return $this->render('horario-sala', [
            'datos' => $datos,
            'sala' => $sala
            ]);
    }

}
