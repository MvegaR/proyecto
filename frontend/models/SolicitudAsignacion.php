<?php

namespace frontend\models;

use Yii;

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
            [['ID_ESTADO_SOLICITUD', 'CAPACIDAD_ASIGNACION', 'TIPO_SALA_ASIGNACION'], 'integer'],
            [['DOCENTE_ASIGNACION', 'ASIGNATURA_ASIGNACION', 'SECCION_ASIGNACION', 'CAPACIDAD_ASIGNACION', 'TIPO_SALA_ASIGNACION'], 'required'],
            [['DOCENTE_ASIGNACION', 'ASIGNATURA_ASIGNACION', 'SECCION_ASIGNACION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ASIGNACION' => 'Id  Asignacion',
            'ID_ESTADO_SOLICITUD' => 'Id  Estado  Solicitud',
            'DOCENTE_ASIGNACION' => 'Docente  Asignacion',
            'ASIGNATURA_ASIGNACION' => 'Asignatura  Asignacion',
            'SECCION_ASIGNACION' => 'Seccion  Asignacion',
            'CAPACIDAD_ASIGNACION' => 'Capacidad  Asignacion',
            'TIPO_SALA_ASIGNACION' => 'Tipo  Sala  Asignacion',
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
