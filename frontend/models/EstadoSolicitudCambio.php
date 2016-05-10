<?php

namespace frontend\models;

use Yii;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * This is the model class for table "estado_solicitud_cambio".
 *
 * @property integer $ID_ESTADO_CAMBIO
 * @property string $NOMBRE_ESTADO_CAMBIO
 *
 * @property SolicitudCambio[] $solicitudCambios
 */
class EstadoSolicitudCambio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $reCaptcha; 
    public static function tableName()
    {
        return 'estado_solicitud_cambio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_ESTADO_CAMBIO'], 'required'],
            [['NOMBRE_ESTADO_CAMBIO'], 'string', 'max' => 255],
			[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_CAMBIO' => 'Id  Estado  Cambio',
            'NOMBRE_ESTADO_CAMBIO' => 'Nombre  Estado  Cambio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudCambios()
    {
        return $this->hasMany(SolicitudCambio::className(), ['ID_ESTADO_CAMBIO' => 'ID_ESTADO_CAMBIO']);
    }
}
