<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Seccion;
use frontend\models\Asignatura;
use frontend\models\SolicitudAsignacionTemporal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class HorarioDocenteController extends Controller
{
    
    
    public function actionIndex(){

        $array = array();
        $id = Yii::$app -> user -> identity -> ID_DOCENTE;
        for($i = 1, $j = 1; $i < 7; $i++, $j++){
            $var1 = Seccion::getHORARIOSPORPROFESOR($i,'08:10:00',$id);
            $var2 = Seccion::getHORARIOSPORPROFESOR($i,'08:50:00',$id);
            $var3 = Seccion::getHORARIOSPORPROFESOR($i,'09:40:00',$id);
            $var4 = Seccion::getHORARIOSPORPROFESOR($i,'10:20:00',$id);
            $var5 = Seccion::getHORARIOSPORPROFESOR($i,'11:10:00',$id);
            $var6 = Seccion::getHORARIOSPORPROFESOR($i,'11:50:00',$id);
            $var7 = Seccion::getHORARIOSPORPROFESOR($i,'12:40:00',$id);
            $var8 = Seccion::getHORARIOSPORPROFESOR($i,'13:20:00',$id);
            $var9 = Seccion::getHORARIOSPORPROFESOR($i,'14:10:00',$id);
            $var10 = Seccion::getHORARIOSPORPROFESOR($i,'14:50:00',$id);
            $var11 = Seccion::getHORARIOSPORPROFESOR($i,'15:40:00',$id);
            $var12 = Seccion::getHORARIOSPORPROFESOR($i,'16:20:00',$id);
            $var13 = Seccion::getHORARIOSPORPROFESOR($i,'17:10:00',$id);
            $var14 = Seccion::getHORARIOSPORPROFESOR($i,'17:50:00',$id);
            $var15 = Seccion::getHORARIOSPORPROFESOR($i,'18:40:00',$id);
            $var16 = Seccion::getHORARIOSPORPROFESOR($i,'19:20:00',$id);
            $var17 = Seccion::getHORARIOSPORPROFESOR($i,'20:10:00',$id);
            $var18 = Seccion::getHORARIOSPORPROFESOR($i,'20:50:00',$id);
            $var19 = Seccion::getHORARIOSPORPROFESOR($i,'21:40:00',$id);
            $var20 = Seccion::getHORARIOSPORPROFESOR($i,'22:20:00',$id);
            array_push($array,$var1,$var2,$var3,$var4,$var5,
                             $var6,$var7,$var8,$var9,$var10,
                             $var11,$var12,$var13,$var14,$var15,
                             $var16,$var17,$var18,$var19,$var20
                    );
        }
        $sql = "Select * from solicitud_asignacion_temporal where DOCENTE_ASIGNACION_TEMPORAL='$id' and ID_ASIGNACION_TEMPORAL = SOLICITUD_TEMPORAL_PADRE";
        $solicitudes = SolicitudAsignacionTemporal::findBySql($sql) -> all();
       
        return $this->render('index', [
            'array' => $array,'solicitudes' => $solicitudes
        ]);
    }

}