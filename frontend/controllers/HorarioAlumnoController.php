<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Asignatura;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class HorarioAlumnoController extends Controller
{

    
    public function actionIndex($carrera, $anio, $semestre){

        $array = array();
       // $id = Yii::$app -> user -> identity -> ID_DOCENTE;
        for($i = 1, $j = 1; $i < 7; $i++, $j++){
            $var1 = Asignatura::getHORARIOALUMNO($i,'08:10:00', $carrera, $anio, $semestre);
            $var2 = Asignatura::getHORARIOALUMNO($i,'08:50:00', $carrera, $anio, $semestre);
            $var3 = Asignatura::getHORARIOALUMNO($i,'09:40:00', $carrera, $anio, $semestre);
            $var4 = Asignatura::getHORARIOALUMNO($i,'10:20:00', $carrera, $anio, $semestre);
            $var5 = Asignatura::getHORARIOALUMNO($i,'11:10:00', $carrera, $anio, $semestre);
            $var6 = Asignatura::getHORARIOALUMNO($i,'11:50:00', $carrera, $anio, $semestre);
            $var7 = Asignatura::getHORARIOALUMNO($i,'12:40:00', $carrera, $anio, $semestre);
            $var8 = Asignatura::getHORARIOALUMNO($i,'13:20:00', $carrera, $anio, $semestre);
            $var9 = Asignatura::getHORARIOALUMNO($i,'14:10:00', $carrera, $anio, $semestre);
            $var10 = Asignatura::getHORARIOALUMNO($i,'14:50:00', $carrera, $anio, $semestre);
            $var11 = Asignatura::getHORARIOALUMNO($i,'15:40:00', $carrera, $anio, $semestre);
            $var12 = Asignatura::getHORARIOALUMNO($i,'16:20:00', $carrera, $anio, $semestre);
            $var13 = Asignatura::getHORARIOALUMNO($i,'17:10:00', $carrera, $anio, $semestre);
            $var14 = Asignatura::getHORARIOALUMNO($i,'17:50:00', $carrera, $anio, $semestre);
            $var15 = Asignatura::getHORARIOALUMNO($i,'18:40:00', $carrera, $anio, $semestre);
            $var16 = Asignatura::getHORARIOALUMNO($i,'19:20:00', $carrera, $anio, $semestre);
            $var17 = Asignatura::getHORARIOALUMNO($i,'20:10:00', $carrera, $anio, $semestre);
            $var18 = Asignatura::getHORARIOALUMNO($i,'20:50:00', $carrera, $anio, $semestre);
            $var19 = Asignatura::getHORARIOALUMNO($i,'21:40:00', $carrera, $anio, $semestre);
            $var20 = Asignatura::getHORARIOALUMNO($i,'22:20:00', $carrera, $anio, $semestre);
            array_push($array,$var1,$var2,$var3,$var4,$var5,
                             $var6,$var7,$var8,$var9,$var10,
                             $var11,$var12,$var13,$var14,$var15,
                             $var16,$var17,$var18,$var19,$var20
                    );
        }
       
        return $this->render('index', [
            'array' => $array,
        ]);
    }

}