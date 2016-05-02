<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solicitud_cambio".
 *
 * @property integer $ID_CAMBIO
 * @property integer $ID_ESTADO_CAMBIO
 * @property string $ASIGNATURA_CAMBIO
 * @property string $SECCION_CAMBIO
 * @property string $DOCENTE_CAMBIO
 * @property integer $CAPACIDAD_CAMBIO
 *
 * @property EstadoSolicitudCambio $iDESTADOCAMBIO
 */
class SolicitudCambio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud_cambio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_CAMBIO', 'CAPACIDAD_CAMBIO'], 'integer'],
            [['ASIGNATURA_CAMBIO', 'SECCION_CAMBIO', 'DOCENTE_CAMBIO', 'CAPACIDAD_CAMBIO'], 'required'],
            [['ASIGNATURA_CAMBIO', 'SECCION_CAMBIO', 'DOCENTE_CAMBIO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CAMBIO' => 'Id  Cambio',
            'ID_ESTADO_CAMBIO' => 'Id  Estado  Cambio',
            'ASIGNATURA_CAMBIO' => 'Asignatura  Cambio',
            'SECCION_CAMBIO' => 'Seccion  Cambio',
            'DOCENTE_CAMBIO' => 'Docente  Cambio',
            'CAPACIDAD_CAMBIO' => 'Capacidad  Cambio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTADOCAMBIO()
    {
        return $this->hasOne(EstadoSolicitudCambio::className(), ['ID_ESTADO_CAMBIO' => 'ID_ESTADO_CAMBIO']);
    }
}