<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estado_asignacion_temporal".
 *
 * @property integer $ID_ESTADO_ASIGNACION_TEMPORAL
 * @property string $NOMBRE_ESTADO_ASIGNACION_TEMPORAL
 *
 * @property AsignacionTemporal[] $AsignacionTemporals
 */
class EstadoAsignacionTemporal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_asignacion_temporal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_ESTADO_ASIGNACION_TEMPORAL'], 'required'],
            [['NOMBRE_ESTADO_ASIGNACION_TEMPORAL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_ASIGNACION_TEMPORAL' => 'Id  Estado  Asignacion  Temporal',
            'NOMBRE_ESTADO_ASIGNACION_TEMPORAL' => 'Nombre  Estado  Asignacion  Temporal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionTemporals()
    {
        return $this->hasMany(AsignacionTemporal::className(), ['ID_ESTADO_ASIGNACION_TEMPORAL' => 'ID_ESTADO_ASIGNACION_TEMPORAL']);
    }
}
