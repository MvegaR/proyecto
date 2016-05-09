<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estado_solicitud_asignacion".
 *
 * @property integer $ID_ESTADO_SOLICITUD
 * @property string $NOMBRE_ESTADO
 *
 * @property SolicitudAsignacion[] $solicitudAsignacions
 */
class EstadoSolicitudAsignacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $reCaptcha;
    public static function tableName()
    {
        return 'estado_solicitud_asignacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_ESTADO'], 'required'],
            [['NOMBRE_ESTADO'], 'string', 'max' => 255],
			[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_SOLICITUD' => 'Id  Estado  Solicitud',
            'NOMBRE_ESTADO' => 'Nombre  Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitudAsignacions()
    {
        return $this->hasMany(SolicitudAsignacion::className(), ['ID_ESTADO_SOLICITUD' => 'ID_ESTADO_SOLICITUD']);
    }
}
