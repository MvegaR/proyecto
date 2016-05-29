<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bloque;
use frontend\models\Dia;
use frontend\models\Sala;
use frontend\models\TiempoInicio;
use frontend\models\SolicitudAsignacionTemporal;
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
        public function actionDelete($id){
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
        protected function findModel($id){
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
                    echo "<option value='".$bloque->ID_BLOQUE."'> $dia - De: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
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
                    echo "<option value='".$bloque->ID_BLOQUE."'> $dia - De: ".$bloque->INICIO." a ".$bloque->TERMINO."</option>";
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
            $fechadividida = explode("-", $fecha);
            $nombreDia = date("l",mktime(0,0,0,intval($fechadividida[1]), intval($fechadividida[2]), intval($fechadividida[0]))); 
           
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
            $idDia = (Dia::find()-> where(["NOMBRE" => $nombreDia]) -> one());
            if($idDia){
                $idDia = $idDia -> ID_DIA;
            }else{
                echo "<option value=>El día $nombreDia seleccionado no es valido</option>"; 
                return;
            }
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

                    $todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia]) -> orderBy("INICIO")->all();
                    $todoslosIdsBloquesEnOrden = [];
                    foreach ($todosLosBloquesEnOrden as $idbloque) {
                        array_push($todoslosIdsBloquesEnOrden, $idbloque -> ID_BLOQUE);
                    }


                    $bloques = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $idDia, "ID_SECCION" => null]) -> orderBy("INICIO") ->all();
                    $idsBloquesDisponibles = [];
                    $idsBloquesDisponibles2 = [];
                    $contador = 0;
                    foreach ($bloques as $bloque){
                        if($contador < (count($todosLosBloquesEnOrden) - $cantidad+1)){
                            array_push($idsBloquesDisponibles, $bloque -> ID_BLOQUE);
                        }
                        array_push($idsBloquesDisponibles2, $bloque -> ID_BLOQUE);
                        $contador++;
                    }
                    
                    
                    if(count($idsBloquesDisponibles) == 0){
                            echo "<option value=>Sin bloques disponibles para la CANTIDAD de periodos solicitados</option>"; //culpa de las asignaciones permanentes.
                            return;
                        }

                        $contadorBloquesNoDisponebesTemporales = SolicitudAsignacionTemporal::find() 
                        ->where(["FECHA_ASIGNACION_TEMPORAL" => $fecha, "SALA_ASIGNACION_TEMPORAL" => $sala])  ->count();
                        if($contadorBloquesNoDisponebesTemporales != 0){
                            $bloquesTemporales = SolicitudAsignacionTemporal::find() 
                            ->where(["FECHA_ASIGNACION_TEMPORAL" => $fecha, "SALA_ASIGNACION_TEMPORAL" => $sala]) ->all();
                            foreach($bloquesTemporales as $bloquetemporal){
                                $posicionBloque = array_search($bloquetemporal -> INICIO_BLOQUE_ASIGNACION_TEMPORAL, $idsBloquesDisponibles);
                                unset($idsBloquesDisponibles[$posicionBloque]);
                            }
                        }
                        if(count($idsBloquesDisponibles) == 0){
                        echo "<option value=>Sin bloques para la FECHA seleccionada</option>"; //culpa bloques temporales
                        return;
                    }else{

                        foreach ($idsBloquesDisponibles2 as $idbloque){
                            if(!$this -> equalsDosArray((array_slice($idsBloquesDisponibles2, array_search($idbloque, $idsBloquesDisponibles2), $cantidad)), 
                               (array_slice($todoslosIdsBloquesEnOrden, array_search($idbloque, $todoslosIdsBloquesEnOrden), $cantidad)))){
                                unset($idbloque);
                        }
                    }
                    $idsBloquesDisponibles = array_intersect($idsBloquesDisponibles, $idsBloquesDisponibles2);
                    if(count($idsBloquesDisponibles)  == 0){
                            echo "<option value=>Sin bloques disponibles para la CANTIDAD de periodos en la FECHA ingresada</option>"; //culpa de las asignaciones temporales.
                            return;
                        }else{
                            foreach ($idsBloquesDisponibles as $idbloque) {
                                $bl = Bloque::find() -> where(["ID_BLOQUE" => $idbloque]) -> one();
                                $blFin = Bloque::find() -> where(["ID_BLOQUE" => 
                                    $todoslosIdsBloquesEnOrden[array_search($idbloque, $todoslosIdsBloquesEnOrden)+$cantidad-1]]) -> one();
                                echo "<option value='".$idbloque."'> $nombreDia - De: ".$bl->INICIO." a ".$blFin->TERMINO."</option>";

                            }
                        }
                    }
                }
            }
        }
        private function equalsDosArray($ar, $er){
            if(count($ar) != count($er)){
                return false;
            }
            foreach ($ar as $a) {
                if($a != $er[array_search($a, $ar)]){
                    return false;
                }
            }
            return true;
        }

        //Funcion que entrega los bloques posibles para una asignación permanente. (no se consideran los bloques temporales)
        public function actionLists5($sala, $cantidad){ 
            
            $dias = Dia::find() -> all();
            $option = [];
            foreach ($dias as $dia) {
                $todosLosBloquesEnOrden = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $dia -> ID_DIA]) -> orderBy("INICIO")->all();
                $contadorBloquesDisponibles = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $dia -> ID_DIA, "ID_SECCION" => null]) -> orderBy("INICIO")->count();
                if($contadorBloquesDisponibles == 0){
                    continue;
                }else if($contadorBloquesDisponibles < $cantidad){
                    continue;
                }
                $bloquesDisponibles = Bloque::find()->where(["ID_SALA" => $sala, "ID_DIA" => $dia -> ID_DIA, "ID_SECCION" => null]) -> orderBy("INICIO")->all();
                $idsBloquesDisponibles = []; //Los que si alcanzan a cumplir con la cantidad de bloques.= # -cantidad+1
                $idsBloquesDisponibles2 = []; //Los que no tienen interrupciones para la cantidad de bloques.
                $todoslosIdsBloquesEnOrden = []; //para crear el anterior. (final = join(1 y 2))
                $contador = 0;
                
                foreach ($bloquesDisponibles as $bloque) {
                    if($contador < (count($bloquesDisponibles) - $cantidad+1)){
                        array_push($idsBloquesDisponibles, $bloque -> ID_BLOQUE);
                    }
                    array_push($idsBloquesDisponibles2, $bloque -> ID_BLOQUE);
                    $contador++;
                }

                unset($bloquesDisponibles); //ahorrar
                foreach ($todosLosBloquesEnOrden as $bloque) {
                    array_push($todoslosIdsBloquesEnOrden, $bloque -> ID_BLOQUE);
                }
                unset($todosLosBloquesEnOrden); //ahorrar



                foreach ($idsBloquesDisponibles2 as $idbloque){
                    if(!$this -> equalsDosArray((array_slice($idsBloquesDisponibles2, array_search($idbloque, $idsBloquesDisponibles2), $cantidad)), (array_slice($todoslosIdsBloquesEnOrden, array_search($idbloque, $todoslosIdsBloquesEnOrden), $cantidad)))){

                        unset($idbloque);
                    }
                }





                $idsBloquesDisponibles = array_intersect($idsBloquesDisponibles, $idsBloquesDisponibles2);

                foreach ($idsBloquesDisponibles as $idasdf) {
                    $bl = Bloque::find() -> where(["ID_BLOQUE" => $idasdf]) -> one();
                    $blFin = Bloque::find() -> where(["ID_BLOQUE" => 
                        $todoslosIdsBloquesEnOrden[array_search($idasdf, $todoslosIdsBloquesEnOrden)+$cantidad-1]]) -> one();
                    $dia = Dia::find() -> where(["ID_DIA" => $bl -> ID_DIA]) -> one() -> NOMBRE;
                    array_push($option, "<option value='".$idasdf."'> $dia - De: ".$bl->INICIO." a ".$blFin->TERMINO."</option>");
                }
            }
            
            if($cantidad > TiempoInicio::find()-> count()){
                 echo "<option value=>Cantidad de bloques solicitados supera un día normal</option>";
                 return;
            }else if(count($option) == 0){
                echo "<option value=>Sin bloques disponibles para la SALA seleccionada</option>";
                return;
            }else if(count($option) < 0){
                 echo "<option value=>Sin bloques disponibles para la CANTIDAD de periodos seleccionados</option>";
                 return;
            }else{
                foreach ($option as $o) {
                    echo $o;
                }
            }

        }



        
    }