<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\SubirArchivo;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public function actionEntrega(){
        return $this -> render("entrega");
    }

    public function actionEntrega2(){
        return $this -> render("entrega2");
    }

    public function actionMenuAdmin(){
        return $this -> render("menuAdmin");
    }

    public function actionRespaldo(){
        return $this -> render("respaldo");
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
        [
        'actions' => ['signup'],
        'allow' => true,
        'roles' => ['?'],
        ],
        [
        'actions' => ['logout'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'logout' => ['post'],
        ],
        ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            ]);
    }

    public function actionResumenImportacion(){
        return $this->render("resumenImportacion",['tabla' => 'nombretabla']);
    }


/* MEJORA pseudocodigo (revisar claves foraneas)
//if $valor != null
    $consulta = select ID, REF_NAME from INNODB_SYS_FOREIGN where FOR_NAME = $nombreBD./.$nombretabla //(desde db2)
    if($consulta.count() > 0){
        por cada uno
            select REF_COL_NAME from //(desde db2)
            INNODB_SYS_FOREIGN_COLS
            where id = $id

            select count(id) from $ref_name //(desde db)
            where $ref_col_name = $valor

            if($count(id) == 0) {
                Inserte en $ref_name una tupla con clave igual a $valor antes de continuar.
            }else{nada...}
        
    }


*/


    public function actionImportarExcel($nombretabla){
        if(strpos($nombretabla,'/',0) != false){
            $nombretabla = substr($nombretabla, 0, strpos($nombretabla,'/',0));
        }else if (strpos($nombretabla,'%',0) != false){
            $nombretabla = substr($nombretabla, 0, strpos($nombretabla,'%',0) );
        }
        
        $agregar = [];
        $actualizar = [];
        $consultas = [];
        $resultado = null;
        $inputFile = null;
        $paginaAnterior = $nombretabla."/index";
        $nombreDB = Yii::$app -> db -> createCommand("SELECT DATABASE()") -> queryOne()['DATABASE()'];
        $file = new SubirArchivo;
        $date = date('y-m-d_h-m-s');
        $nombretabla2 = null;
        if($file -> load(Yii::$app->request->post())){
            $file -> file = UploadedFile::getInstance($file,'file');
            $file -> file -> saveAs('imports/'.$nombretabla.'_'.$date.'.'.$file->file->extension);
            //comenzar lectura;
            $inputFile = 'imports/'.$nombretabla.'_'.$date.'.'.$file->file->extension;
            try{
                $inputFileType = \PHPExcel_IOfactory::identify($inputFile);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader -> load($inputFile);
            } catch(Exception $e){
                die("Error en abrir archivo");
            }
            
            $sheet = $objPHPExcel -> getSheet(0);
            $nFilas = $sheet -> getHighestRow();
            $nColumnas = $sheet -> getHighestColumn();

            for($row = 1; $row <= $nFilas; $row++){
                $rowData = $sheet->rangeToArray('A'.$row.':'.$nColumnas.$row,null,true,false);
                if($row == 1){
                    continue;
                } 
                $nombretabla2 = "".$nombretabla;
                $nombretabla2 = str_replace('-', '_', $nombretabla2);

                $selectDB2 = "SELECT COLUMN_NAME FROM COLUMNS where TABLE_SCHEMA = '$nombreDB' and TABLE_NAME = '$nombretabla2' and COLUMN_KEY = 'PRI'";
                $clave = Yii::$app -> db2 -> createCommand($selectDB2) -> queryOne()['COLUMN_NAME'];
                if(ctype_digit($rowData[0][0])){
                    $selectSql = "SELECT * FROM $nombretabla2 WHERE $clave = ".$rowData[0][0].";";
                }else{
                    $selectSql = "SELECT * FROM $nombretabla2 WHERE $clave = '".$rowData[0][0]."';";
                }
                if( (Yii::$app -> db -> createCommand($selectSql) -> execute()) == 1 ){
                    $selectDB2 = "SELECT COLUMN_NAME FROM COLUMNS where TABLE_SCHEMA = '$nombreDB' and TABLE_NAME = '$nombretabla2'; orderBy(ORDINAL_POSITION);";
                    $resultado = Yii::$app -> db2 -> createCommand($selectDB2) -> queryAll();
                    array_push($actualizar, $rowData[0]);
                } else {
                    array_push($agregar, $rowData[0]);
                }
            } 
        }
        
        return $this -> render("resumenImportacion",["agregar" => $agregar, "actualizar" => $actualizar, "paginaAnterior" => $paginaAnterior, "archivo" => $inputFile,"tabla"=>$nombretabla2, "columnas" => $resultado]);

    }

    private function print_paraSQL($array){ //numero o caracteres
        $r = "";

        foreach ($array as $valor) {
            if(ctype_digit($valor)){
                $r.=$valor.", ";
            }if($valor == '(no definido)'){
                $r.='null'.", ";
            }else{
                $r.="'".$valor."', ";
            }
        }
        $r = substr($r, 0, strrpos($r,", "));
        return $r;
    }

    public function actionEjecutarImportacion($el, $inputFile){

        $nombretabla = $el;
        $agregar = [];
        $actualizar = [];
        $consultas = [];
        $resultado = null;
        $nombreDB = Yii::$app -> db -> createCommand("SELECT DATABASE()") -> queryOne()['DATABASE()'];
        $paginaAnterior = $nombretabla."/index";
        try{
            $inputFileType = \PHPExcel_IOfactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader -> load($inputFile);
        } catch(Exception $e){
            die("Error en abrir archivo");
        }
        $sheet = $objPHPExcel -> getSheet(0);
        $nFilas = $sheet -> getHighestRow();
        $nColumnas = $sheet -> getHighestColumn();
        for($row = 1; $row <= $nFilas; $row++){
            $rowData = $sheet->rangeToArray('A'.$row.':'.$nColumnas.$row,null,true,false);
            if($row == 1){
                continue;
            } 
            $nombretabla2 = "".$nombretabla;
            $nombretabla2 = str_replace('-', '_', $nombretabla2);

            $selectDB2 = "SELECT COLUMN_NAME FROM COLUMNS where TABLE_SCHEMA = '$nombreDB' and TABLE_NAME = '$nombretabla2' and COLUMN_KEY = 'PRI'";
            $clave = Yii::$app -> db2 -> createCommand($selectDB2) -> queryOne()['COLUMN_NAME'];
            if(ctype_digit($rowData[0][0])){
                $selectSql = "SELECT * FROM $nombretabla2 WHERE $clave = ".$rowData[0][0].";";
            }else{
                $selectSql = "SELECT * FROM $nombretabla2 WHERE $clave = '".$rowData[0][0]."';";
            }
            if( (Yii::$app -> db -> createCommand($selectSql) -> execute()) == 1 ){
                $selectDB2 = "SELECT COLUMN_NAME FROM COLUMNS where TABLE_SCHEMA = '$nombreDB' and TABLE_NAME = '$nombretabla2'; orderBy(ORDINAL_POSITION);";
                $resultado = Yii::$app -> db2 -> createCommand($selectDB2) -> queryAll();
                $cadena = "UPDATE $nombretabla2 SET ";
                $contador = 0;
                foreach($resultado as $fila){
                    if(ctype_digit($rowData[0][$contador])){
                        $cadena = $cadena.array_values($fila)[0]." = ".$rowData[0][$contador].", "; 
                    }else{
                        if($rowData[0][$contador] == "(no definido)"){ 
                          $cadena = $cadena.array_values($fila)[0]." = NULL, ";
                      }else{
                        $cadena = $cadena.array_values($fila)[0]." = '".$rowData[0][$contador]."', ";
                    }
                }   
                $contador ++;
            }
            $contador = 0;

            $cadena = substr($cadena, 0, strrpos( $cadena,", "));
   
            if(ctype_digit($rowData[0][$contador])){
                $cadena = $cadena." WHERE $clave = ".$rowData[0][0]."";
            }else{
             $cadena = $cadena." WHERE $clave = '".$rowData[0][0]."'";
            }
            array_push($actualizar, $rowData[0]);
            array_push($consultas, $cadena);
        } else {
            array_push($consultas, "INSERT INTO $nombretabla2 values (".$this->print_paraSQL($rowData[0]).")");
            array_push($agregar, $rowData[0]);
    }
} 

foreach ($consultas as $consulta) {

    Yii::$app -> db -> createCommand($consulta) -> execute();
}

return $this->redirect("index.php?r=".$paginaAnterior);

}




}
