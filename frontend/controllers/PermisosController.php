<?php
namespace frontend\controllers;
use Yii;
use frontend\models\Rol;
use yii\web\Controller;
use yii\web\UnauthorizedHttpException;

class PermisosController extends Controller{
	public static function permisoAdministrador(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL);
		if( $rol != "Administrador"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}
	public static function permisoAdminDocente(){

		if(Yii::$app->user->isGuest){
			throw new UnauthorizedHttpException("Debe iniciar sesión para realizar esta operación.");
		}
		$rol = (Rol::findOne(Yii::$app -> user -> identity -> ID_ROL) -> NOMBRE_ROL);
		if( $rol != "Docente" && $rol != "Administrador"){
			throw new UnauthorizedHttpException("Su rol de usuario no tiene los privilegios necesarios para realizar esta operación.");
		}
		return $rol;

	}


}


?>