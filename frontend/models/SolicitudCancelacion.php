<?php

namespace frontend\models;

use Yii;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * This is the model class for table "solicitud_cancelacion".
 *
 * @property integer $ID_CANCELACION
 * @property integer $ID_ESTADO_CANCELACION
 * @property string $DOCENTE_CANCELACION
 * @property string $ASIGNATURA_CANCELACION
 * @property string $SECCION_CANCELACION
 * @property integer $BLOQUE_CANCELACION
 * @property string $MOTIVO
 *
 * @property EstadoSolicitudCancelacion $iDESTADOCANCELACION
 */
class SolicitudCancelacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $reCaptcha;
    public static function tableName()
    {
        return 'solicitud_cancelacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_CANCELACION', 'BLOQUE_CANCELACION'], 'integer'],
            [['DOCENTE_CANCELACION', 'ASIGNATURA_CANCELACION', 'BLOQUE_CANCELACION'], 'required'],
            [['MOTIVO'], 'string'],
            [['DOCENTE_CANCELACION', 'ASIGNATURA_CANCELACION', 'SECCION_CANCELACION'], 'string', 'max' => 255],
			[['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LfD6hITAAAAAEdV6MQ8zDX3emwQY4bVYyw-L3nz' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CANCELACION' => 'Id  Cancelacion',
            'ID_ESTADO_CANCELACION' => 'Id  Estado  Cancelacion',
            'DOCENTE_CANCELACION' => 'Docente  Cancelacion',
            'ASIGNATURA_CANCELACION' => 'Asignatura  Cancelacion',
            'SECCION_CANCELACION' => 'Seccion  Cancelacion',
            'BLOQUE_CANCELACION' => 'Bloque  Cancelacion',
            'MOTIVO' => 'Motivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTADOCANCELACION()
    {
        return $this->hasOne(EstadoSolicitudCancelacion::className(), ['ID_ESTADO_CANCELACION' => 'ID_ESTADO_CANCELACION']);
    }
}
