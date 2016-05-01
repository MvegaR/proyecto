<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estado_solicitud_cancelacion".
 *
 * @property integer $ID_ESTADO_CANCELACION
 * @property string $NOMBRE_ESTADO_CANCELACION
 *
 * @property SolicitudCancelacion[] $solicitudCancelacions
 */
class EstadoSolicitudCancelacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_solicitud_cancelacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_ESTADO_CANCELACION'], 'required'],
            [['NOMBRE_ESTADO_CANCELACION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_CANCELACION' => 'Id  Estado  Cancelacion',
            'NOMBRE_ESTADO_CANCELACION' => 'Nombre  Estado  Cancelacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudCancelacions()
    {
        return $this->hasMany(SolicitudCancelacion::className(), ['ID_ESTADO_CANCELACION' => 'ID_ESTADO_CANCELACION']);
    }
}
