
<?php
use frontend\models\Asignatura; 
use frontend\models\Bloque; 
use frontend\models\Carrera;
use frontend\models\Departamento;
use frontend\models\Dia; 
use frontend\models\Docente; 
use frontend\models\Edificio;
use frontend\models\EstadoSolicitudAsignacion; 
use frontend\models\EstadoAsignacionTemporal; 
use frontend\models\EstadoSolicitudCambio; 
use frontend\models\EstadoSolicitudCancelacion;
use frontend\models\EstadoSolicitudDenuncia; 
use frontend\models\Facultad; 
use frontend\models\PostDeDenuncia;
use frontend\models\Rol; 
use frontend\models\Sala; 
use frontend\models\Seccion;
use frontend\models\SolicitudAsignacion;
use frontend\models\SolicitudAsignacionTemporal;  
use frontend\models\SolicitudCambio; 
use frontend\models\SolicitudCancelacion;
use frontend\models\TiempoInicio; 
use frontend\models\TipoDenuncia; 
use frontend\models\TipoSala;

\moonland\phpexcel\Excel::widget([
    'isMultipleSheet' => true, 
    'models' => [
        'tiempo_inicio' =>TiempoInicio::find()->all(),
        'tipo_denuncia' =>TipoDenuncia::find()->all(),
        'tipo_sala' =>TipoSala::find()->all(),
        'rol' =>Rol::find()->all(),
        'dia' =>Dia::find()->all(),
        'facultad' =>Facultad::find()->all(),
        'departamento' =>Departamento::find()->all(),
        'carrera' =>Carrera::find()->all(),
        'asignatura' =>Asignatura::find()->all(),
        'seccion' =>Seccion::find()->all(),
        'docente' =>Docente::find()->all(),
        'edificio' =>Edificio::find()->all(),
        'sala' =>Sala::find()->all(),
        'bloque' =>Bloque::find()->all(),
        'post_de_denuncia' =>PostDeDenuncia::find()->all(),
        'estado_solicitud_asignacion' =>EstadoSolicitudAsignacion::find()->all(),
        'estado_asignacion_temporal' =>EstadoAsignacionTemporal::find()->all(),
        'estado_solicitud_cambio' =>EstadoSolicitudCambio::find()->all(),
        'estado_solicitud_cancelacion' =>EstadoSolicitudCancelacion::find()->all(),
        'estado_solicitud_denuncia' =>EstadoSolicitudDenuncia::find()->all(),
        'solicitud_asignacion' =>SolicitudAsignacion::find()->all(),
        'solicitud_asignacion_temporal' =>SolicitudAsignacionTemporal::find()->all(),
        'solicitud_cambio' =>SolicitudCambio::find()->all(),
        'solicitud_cancelacion' =>SolicitudCancelacion::find()->all(),

    ],
    'mode' => 'export', //default value as 'export' 
    'format' => 'Excel2007',
    'asAttachment' => true,
    /*'columns' => [
        'sheet1' => ['column1','column2','column3'], 
        'sheet2' => ['column1','column2','column3'], 
        'sheet3' => ['column1','column2','column3']
    ],*/
    //without header working, because the header will be get label from attribute label. 
    /*'header' => [
        'sheet1' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet2' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'], 
        'sheet3' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3']
    ],*/
]);
 
\moonland\phpexcel\Excel::export([
    'isMultipleSheet' => true, 
    'models' => [
        'tiempo_inicio' =>TiempoInicio::find()->all(),
        'tipo_denuncia' =>TipoDenuncia::find()->all(),
        'tipo_sala' =>TipoSala::find()->all(),
        'rol' =>Rol::find()->all(),
        'dia' =>Dia::find()->all(),
        'facultad' =>Facultad::find()->all(),
        'departamento' =>Departamento::find()->all(),
        'carrera' =>Carrera::find()->all(),
        'asignatura' =>Asignatura::find()->all(),
        'seccion' =>Seccion::find()->all(),
        'docente' =>Docente::find()->all(),
        'edificio' =>Edificio::find()->all(),
        'sala' =>Sala::find()->all(),
        'bloque' =>Bloque::find()->all(),
        'post_de_denuncia' =>PostDeDenuncia::find()->all(),
        'estado_solicitud_asignacion' =>EstadoSolicitudAsignacion::find()->all(),
        'estado_asignacion_temporal' =>EstadoAsignacionTemporal::find()->all(),
        'estado_solicitud_cambio' =>EstadoSolicitudCambio::find()->all(),
        'estado_solicitud_cancelacion' =>EstadoSolicitudCancelacion::find()->all(),
        'estado_solicitud_denuncia' =>EstadoSolicitudDenuncia::find()->all(),
        'solicitud_asignacion' =>SolicitudAsignacion::find()->all(),
        'solicitud_asignacion_temporal' =>SolicitudAsignacionTemporal::find()->all(),
        'solicitud_cambio' =>SolicitudCambio::find()->all(),
        'solicitud_cancelacion' =>SolicitudCancelacion::find()->all(),
       
    ],

    /*'columns' => [
        'sheet1' => ['column1','column2','column3'],
        'sheet2' => ['column1','column2','column3'], 
        'sheet3' => ['column1','column2','column3']
    ], 
    //without header working, because the header will be get label from attribute label. 
    'header' => [
        'sheet1' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'],
        'sheet2' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3'],
        'sheet3' => ['column1' => 'Header Column 1','column2' => 'Header Column 2', 'column3' => 'Header Column 3']
    ],*/
    'format' => 'Excel2007',
    'asAttachment' => true,
]);
		
//Yii::$app->db2->createCommand((new \yii\db\Query)->select('*')->from('tbl_name'))->queryAll();

?>