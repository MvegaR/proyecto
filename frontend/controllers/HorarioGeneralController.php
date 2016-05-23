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
class HorarioGeneralController extends Controller
{
    
    public function actionDisponibles($dia,$inicio){
        $hora = '08:00:00';
        if($inicio == 0) $hora = '08:10:00';
        else if($inicio == 1) $hora = '08:50:00';
        else if($inicio == 2) $hora = '09:40:00';
        else if($inicio == 3) $hora = '10:20:00';
        else if($inicio == 4) $hora = '11:10:00';
        else if($inicio == 5) $hora = '11:50:00';
        else if($inicio == 6) $hora = '12:40:00';
        else if($inicio == 7) $hora = '13:20:00';
        else if($inicio == 8) $hora = '14:10:00';
        else if($inicio == 9) $hora = '14:50:00';
        else if($inicio == 10) $hora = '15:40:00';
        else if($inicio == 11) $hora = '16:20:00';
        else if($inicio == 12) $hora = '17:10:00';
        else if($inicio == 13) $hora = '17:50:00';
        else if($inicio == 14) $hora = '18:40:00';
        else if($inicio == 15) $hora = '19:20:00';
        else if($inicio == 16) $hora = '20:10:00';
        else if($inicio == 17) $hora = '20:50:00';
        else if($inicio == 18) $hora = '21:40:00';
        else if($inicio == 19) $hora = '22:20:00';
        $result = Sala::getSalasDisponiblesSegunDiaHora($dia,$hora);
        return $this->render("disponibles",["result" => $result, "dia" => $dia, "hora" => $hora]);
    }
    
    public function actionIndex(){
        $array = array();
        for($i = 1, $j = 1; $i < 6; $i++, $j++){
            $var1 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'08:10:00');
            $var2 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'08:50:00');
            $var3 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'09:40:00');
            $var4 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'10:20:00');
            $var5 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'11:10:00');
            $var6 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'11:50:00');
            $var7 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'12:40:00');
            $var8 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'13:20:00');
            $var9 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'14:10:00');
            $var10 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'14:50:00');
            $var11 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'15:40:00');
            $var12 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'16:20:00');
            $var13 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'17:10:00');
            $var14 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'17:50:00');
            $var15 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'18:40:00');
            $var16 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'19:20:00');
            $var17 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'20:10:00');
            $var18 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'20:50:00');
            $var19 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'21:40:00');
            $var20 = Bloque::getCantidadBloquesLibresSegunDiaHora($i,'22:20:00');
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