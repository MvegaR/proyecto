<?php

namespace frontend\models;

use Yii;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * This is the model class for table "solicitud_asignacion".
 *
 * @property integer $ID_ASIGNACION
 * @property integer $ID_ESTADO_SOLICITUD
 * @property string $DOCENTE_ASIGNACION
 * @property string $ASIGNATURA_ASIGNACION
 * @property string $SECCION_ASIGNACION
 * @property integer $CAPACIDAD_ASIGNACION
 * @property integer $TIPO_SALA_ASIGNACION
 *
 * @property EstadoSolicitudAsignacion $iDESTADOSOLICITUD
 */
class SolicitudAsignacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $reCaptcha;
    public static function tableName()
    {
        return 'solicitud_asignacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_SOLICITUD', 'CAPACIDAD_ASIGNACION', 'TIPO_SALA_ASIGNACION', 'CANTIDAD_BLOQUES_ASIGNACION', 'INICIO_BLOQUE_ASIGNACION'], 'integer'],
            [['DOCENTE_ASIGNACION', 'ASIGNATURA_ASIGNACION', 'SECCION_ASIGNACION', 'CAPACIDAD_ASIGNACION', 'TIPO_SALA_ASIGNACION','CANTIDAD_BLOQUES_ASIGNACION', 'INICIO_BLOQUE_ASIGNACION', 'SALA_ASIGNACION'], 'required'],
            [['DOCENTE_ASIGNACION', 'ASIGNATURA_ASIGNACION', 'SECCION_ASIGNACION', 'SALA_ASIGNACION'], 'string', 'max' => 255],
			[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ASIGNACION' => 'Id Asignación',
            'ID_ESTADO_SOLICITUD' => 'Estado Solicitud',
            'DOCENTE_ASIGNACION' => 'Docente Asignación',
            'ASIGNATURA_ASIGNACION' => 'Asignatura Asignación',
            'SECCION_ASIGNACION' => 'Seccion Asignación',
            'CAPACIDAD_ASIGNACION' => 'Capacidad Asignación',
            'TIPO_SALA_ASIGNACION' => 'Tipo Sala Asignación',
            'SALA_ASIGNACION' => 'Sala Asignación',
            'CANTIDAD_BLOQUES_ASIGNACION' => 'Cantidad de bloques asignación', 
            'INICIO_BLOQUE_ASIGNACION' => "Inicio bloque asignación",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTADOSOLICITUD()
    {
        return $this->hasOne(EstadoSolicitudAsignacion::className(), ['ID_ESTADO_SOLICITUD' => 'ID_ESTADO_SOLICITUD']);
    }
}
