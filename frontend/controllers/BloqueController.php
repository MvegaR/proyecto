<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bloque;
use frontend\models\Dia;
use frontend\models\Sala;
use frontend\models\BloqueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

    /**
     * BloqueController implements the CRUD actions for Bloque model.
     */
    class BloqueController extends Controller{
        
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

            if ($model->load(Yii::$app->request->post())) {
                if($model -> ID_DIA == ''){
                    $model -> ID_DIA = null;
                }
                if($model -> ID_SALA == ''){
                    $model -> ID_SALA = null;
                }
                if($model -> ID_SECCION == ''){
                    $model -> ID_SECCION = null;
                }
                if($model -> BLOQUE_SIGUIENTE == ''){
                    $model -> BLOQUE_SIGUIENTE = null;
                }
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
                }
            } 

            return $this->render('create', [
                'model' => $model,
                ]);
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

            if ($model->load(Yii::$app->request->post())) {
                if($model -> ID_DIA == ''){
                    $model -> ID_DIA = null;
                }
                if($model -> ID_SALA == ''){
                    $model -> ID_SALA = null;
                }
                if($model -> ID_SECCION == ''){
                    $model -> ID_SECCION = null;
                }
                if($model -> BLOQUE_SIGUIENTE == ''){
                    $model -> BLOQUE_SIGUIENTE = null;
                }
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->ID_BLOQUE]);
                }
            } 
            return $this->render('update', [
                'model' => $model,
                ]);
            
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
                    echo "<option value='".$bloque->ID_BLOQUE."'> $dia - Tiempo: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
                }
            }else{
                echo "<option value=>Sin bloques para la sala seleccionada</option>";
            }
        }
        //id es el id de la seccion para entregar las opciones de las salas.
        public function actionLists2($id){
            $contadorbloques = Bloque::find()->where(['ID_SECCION' => $id])->count();
            $bloques = Bloque::find()->where(['ID_SECCION' => $id])->all();
            if($contadorbloques > 0){
                foreach ($bloques as $bloque) {
                    $sala = (Sala::find()-> where(['ID_SALA' => $bloque -> ID_SALA])-> one());
                    $sala = $sala -> ID_SALA;
                    echo "<option value='".$sala."'>$sala</option>";
                }
            }else{
                echo "<option value=>Sin salas para la seccion selecionada</option>";
            }
        }

        //id es el id de la seccion para entregar las opciones de los bloques.
        public function actionLists3($id){
            $contadorbloques = Bloque::find()->where(['ID_SECCION' => $id])->count();
            $bloques = Bloque::find()->where(['ID_SECCION' => $id])->all();
            if($contadorbloques > 0){
                foreach ($bloques as $bloque) {
                    $dia = (Dia::find()-> where(['ID_DIA' => $bloque -> ID_DIA])-> one());
                    echo "<option value='".$bloque->ID_BLOQUE."'> $dia - Tiempo: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
                }
            }else{
                echo "<option value=>Sin bloques para la seccion selecionada</option>";
            }
        }
        /*
        Hacer una funcion que escriba las opciones de bloques de una sala dada, que no tenga asignaciones, 
        que no tengan asignaciones temporales para la misma fecha y hora
        */
        public function actionLists4($fecha, $sala, $cantidad){ //nececito: fecha, sala, cantidad de bloques.
            $fechadividida = explode("-", $model -> FECHA_ASIGNACION_TEMPORAL);
            $nombreDia = date("l",mktime(0,0,0,intval($fechadividida[0]), intval($fechadividida[1]), intval($fechadividida[2]))); 
            if($nombreDia == "Monday"){
                $nombreDia = "Lunes";
            }else if($nombreDia == "Tuesday"){
                $nombreDia = "Martes";
            }else if($nombreDia == "Wednesday"){
                $nombreDia = "Miércoles";
            }else if($nombreDia == "Thursday"){
                $nombreDia = "Jueves";
            }else if($nombreDia == "Friday"){
                $nombreDia = "Viernes";
            }else if($nombreDia == "Saturday"){
                $nombreDia = "Sábado";
            }else if($nombreDia == "Sunday"){
                $nombreDia = "Domingo";
            }
            $idDia = Dia::find(["NOMBRE" => $nombreDia]) -> one() -> ID_DIA;
            $contadorDeBloquesDeLaSemana =  Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia, "ID_SECCION" => null])->count();
            if($contadorDeBloquesDeLaSemana == 0){
                echo "<option value=>Sin bloques disponibles para la SALA seleccionada</option>"; //culpa bloques permanentes
                return;
            }else if($contadorDeBloquesDeLaSemana < $cantidad){
                echo "<option value=>Bloques disponibles insuficientes para la CANTIDAD de bloques requeridos</option>"; //culpa bloques permanentes
                return;
            }else{
                $contadorBloquesDiponiblesPermanentes = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia, "ID_SECCION" => null])->count();
                if($contadorBloquesDiponiblesPermanentes == 0){
                    echo "<option value=>Sin bloques disponibles para la sala en día '$nombreDia'</option>"; //culpa bloques permanentes
                    return;
                }else{
                    $bloques = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia, "ID_SECCION" => null]) -> orderBy("INICIO") ->all();
                    $idsBloquesDisponibles = [];
                    foreach ($bloques as $bloque) {
                        array_push($idsBloquesDisponibles, $bloque -> ID_BLOQUE);
                    }

                    $todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia]) -> orderBy("INICIO")->all();
                    $todoslosIdsBloquesEnOrden = [];
                    foreach ($todosLosBloquesEnOrden as $idbloque) {
                        array_push($todoslosIdsBloquesEnOrden, $idbloque -> ID_BLOQUE);
                    }

                    $contador = 0;
                    foreach (array_slice($idsBloquesDisponibles, 0 ,count($idsBloquesDisponibles)-$cantidad) as $idbloque) {
                        if(! (array_slice($idsBloquesDisponibles, $contador, $cantidad) ==
                            array_slice($todoslosIdsBloquesEnOrden, array_search($idbloque, $todoslosIdsBloquesEnOrden), $cantidad))){
                            unset($idsBloquesDisponibles[$contador]); //No cumple con la cantidad de periodos solicitados se quita.
                    }
                    $contador++;
                }

                if(count($idsBloquesDisponibles == 0)){
                        echo "<option value=>Sin bloques disponibles para la CANTIDAD de periodos solicitados</option>"; //culpa de las asignaciones permanentes.
                        return;
                    }

                    $contadorBloquesNoDisponebesTemporales = SolicitudAsignacionTemporal::find() 
                    ->where(["FECHA_ASIGNACION_TEMPORAL" => $fecha, "SALA_ASIGNACION_TEMPORAL" => $sala]) ->orderBy("INICIO") ->count();
                    if($contadorBloquesNoDisponebesTemporales != 0){
                        $bloquesTemporales = SolicitudAsignacionTemporal::find() 
                        ->where(["FECHA_ASIGNACION_TEMPORAL" => $fecha, "SALA_ASIGNACION_TEMPORAL" => $sala]) -> orderBy("INICIO") ->all();
                        foreach($bloquesTemporales as $bloquetemporal){
                            $posicionBloque = array_search($bloquetemporal -> INICIO_BLOQUE_ASIGNACION_TEMPORAL, $idsBloquesDisponibles);
                            unset($idsBloquesDisponibles[$posicionBloque]);
                        }
                    }
                    if(count($idsBloquesDisponibles) == 0){
                        echo "<option value=>Sin bloques para la FECHA seleccionada</option>"; //culpa bloques temporales
                        return;
                    }else if(count($idsBloquesDisponibles) < $cantidad){
                        echo "<option value=>Cantidad de bloques insuficientes para la FECHA y CANTIDAD solicitados</option>";
                        return;
                    }else{

                        $contador = 0;
                        foreach (array_slice($idsBloquesDisponibles, 0 ,count($idsBloquesDisponibles)-$cantidad) as $idbloque) {
                            if(! (array_slice($idsBloquesDisponibles, $contador, $cantidad) ==
                                array_slice($todoslosIdsBloquesEnOrden, array_search($idbloque, $todoslosIdsBloquesEnOrden), $cantidad))){
                                unset($idsBloquesDisponibles[$contador]); //No cumple con la cantidad de periodos solicitados se quita.
                        }
                        $contador++;
                    }
                    if(count($idsBloquesDisponibles == 0)){
                            echo "<option value=>Sin bloques disponibles para Cantidad requerida en la FECHA</option>"; //culpa de las asignaciones temporales.
                            return;
                        }else{
                            foreach ($idsBloquesDisponibles as $idbloque) {
                                $bl = Bloque::find() -> where(["ID_BLOQUE" => $idbloque]) -> one();
                                echo "<option value='".$idbloque."'> $fecha - Tiempo: ".$bl->INICIO." a ".$bl->TERMINO."</option>";
                            }
                        }
                    }
                }
            }
        }
    }