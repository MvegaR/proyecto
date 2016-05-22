
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


 
$data = \moonland\phpexcel\Excel::import($fileName, $config); // $config is an optional
 
$data = \moonland\phpexcel\Excel::widget([
        'mode' => 'import', 
        'fileName' => $fileName, 
        'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel. 
        'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
        //'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
    ]);
 
$data = \moonland\phpexcel\Excel::import($fileName, [
        'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel. 
        'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
        'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
    ]);
 


// export data with multiple worksheet.




// export data with multiple worksheet.


\moonland\phpexcel\Excel::widget([
    'isMultipleSheet' => true, 
    'models' => [
        'asignatura' => (new Asignatura) -> find() -> all(), 
        'bloque' => (new Bloque) -> find() -> all(), 
        'carrera' => (new Carrera) -> find() -> all(),
        'departamento' => (new Departamento) -> find() -> all(),
        'dia' => (new Dia) -> find() -> all(), 
        'docente' => (new Docente) -> find() -> all(), 
        'edificio' => (new Edificio) -> find() -> all(),
        'estado_solicitud_asignacion' => (new EstadoSolicitudAsignacion) -> find() -> all(), 
        'estado_solicitud_temporal' => (new EstadoAsignacionTemporal) -> find() -> all(), 
        'estado_solicitud_cambio' => (new EstadoSolicitudCambio) -> find() -> all(), 
        'estado_solicitud_cancelacion' => (new EstadoSolicitudCancelacion) -> find() -> all(),
        'estado_solicitud_denuncia' => (new EstadoSolicitudDenuncia) -> find() -> all(), 
        'facultad' => (new Facultad) -> find() -> all(), 
        'post_de_denuncia' => (new PostDeDenuncia) -> find() -> all(),
        'rol' => (new Rol) -> find() -> all(), 
        'sala' => (new Sala) -> find() -> all(), 
        'seccion' => (new Seccion) -> find() -> all(),
        'solicitud_asignacion' => (new SolicitudAsignacion) -> find() -> all(), 
        'solicitud_asignacion_temporal' => (new SolicitudAsignacionTemporal) -> find() -> all(), 
        'solicitud_cambio' => (new SolicitudCambio) -> find() -> all(), 
        'solicitud_cancelacion' => (new SolicitudCancelacion) -> find() -> all(),
        'tiempo_inicio' => (new TiempoInicio) -> find() -> all(), 
        'tipo_denuncia' => (new TipoDenuncia) -> find() -> all(), 
        'tipo_sala' => (new TipoSala) -> find() -> all(),
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
        'asignatura' => (new Asignatura) -> find() -> all(), 
        'bloque' => (new Bloque) -> find() -> all(), 
        'carrera' => (new Carrera) -> find() -> all(),
        'departamento' => (new Departamento) -> find() -> all(),
        'dia' => (new Dia) -> find() -> all(), 
        'docente' => (new Docente) -> find() -> all(), 
        'edificio' => (new Edificio) -> find() -> all(),
        'estado_solicitud_asignacion' => (new EstadoSolicitudAsignacion) -> find() -> all(), 
        'estado_solicitud_asignacion_temporal' => (new EstadoSolicitudAsignacionTemporal) -> find() -> all(), 
        'estado_solicitud_cambio' => (new EstadoSolicitudCambio) -> find() -> all(), 
        'estado_solicitud_cancelacion' => (new EstadoSolicitudCancelacion) -> find() -> all(),
        'estado_solicitud_denuncia' => (new EstadoSolicitudDenuncia) -> find() -> all(), 
        'facultad' => (new Facultad) -> find() -> all(), 
        'post_de_denuncia' => (new PostDeDenuncia) -> find() -> all(),
        'rol' => (new Rol) -> find() -> all(), 
        'sala' => (new Sala) -> find() -> all(), 
        'seccion' => (new Seccion) -> find() -> all(),
        'solicitud_asignacion' => (new SolicitudAsignacion) -> find() -> all(), 
        'solicitud_asignacion_temporal' => (new SolicitudAsignacionTemporal) -> find() -> all(), 
        'solicitud_cambio' => (new SolicitudCambio) -> find() -> all(), 
        'solicitud_cancelacion' => (new SolicitudCancelacion) -> find() -> all(),
        'tiempo_inicio' => (new TiempoInicio) -> find() -> all(), 
        'tipo_denuncia' => (new TipoDenuncia) -> find() -> all(), 
        'tipo_sala' => (new TipoSala) -> find() -> all(),
    ], /*'columns' => [
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