<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solicitud_asignacion_temporal".
 *
 * @property integer $ID_ASIGNACION_TEMPORAL
 * @property integer $ID_ESTADO_ASIGNACION_TEMPORAL
 * @property string $DOCENTE_ASIGNACION_TEMPORAL
 * @property integer $CAPACIDAD_ASIGNACION_TEMPORAL
 * @property string $SALA_ASIGNACION_TEMPORAL
 * @property string $FECHA_ASIGNACION_TEMPORAL
 * @property integer $CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL
 * @property string $INICIO_BLOQUE_ASIGNACION_TEMPORAL
 *
 * @property EstadoSolicitudAsignacionTemporal $iDESTADOASIGNACIONTEMPORAL
 */
class SolicitudAsignacionTemporal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud_asignacion_temporal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_ASIGNACION_TEMPORAL', 'CAPACIDAD_ASIGNACION_TEMPORAL', 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL'], 'integer'],
            [['DOCENTE_ASIGNACION_TEMPORAL', 'CAPACIDAD_ASIGNACION_TEMPORAL', 'SALA_ASIGNACION_TEMPORAL', 'FECHA_ASIGNACION_TEMPORAL', 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL', 'INICIO_BLOQUE_ASIGNACION_TEMPORAL'], 'required'],
            [['FECHA_ASIGNACION_TEMPORAL', 'INICIO_BLOQUE_ASIGNACION_TEMPORAL'], 'safe'],
            [['DOCENTE_ASIGNACION_TEMPORAL', 'SALA_ASIGNACION_TEMPORAL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ASIGNACION_TEMPORAL' => 'Id  Asignacion  Temporal',
            'ID_ESTADO_ASIGNACION_TEMPORAL' => 'Id  Estado  Asignacion  Temporal',
            'DOCENTE_ASIGNACION_TEMPORAL' => 'Docente  Asignacion  Temporal',
            'CAPACIDAD_ASIGNACION_TEMPORAL' => 'Capacidad  Asignacion  Temporal',
            'SALA_ASIGNACION_TEMPORAL' => 'Sala  Asignacion  Temporal',
            'FECHA_ASIGNACION_TEMPORAL' => 'Fecha  Asignacion  Temporal',
            'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL' => 'Cantidad  Bloques  Asignacion  Temporal',
            'INICIO_BLOQUE_ASIGNACION_TEMPORAL' => 'Inicio  Bloque  Asignacion  Temporal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTADOASIGNACIONTEMPORAL()
    {
        return $this->hasOne(EstadoSolicitudAsignacionTemporal::className(), ['ID_ESTADO_ASIGNACION_TEMPORAL' => 'ID_ESTADO_ASIGNACION_TEMPORAL']);
    }
}
