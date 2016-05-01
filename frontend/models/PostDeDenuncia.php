<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post_de_denuncia".
 *
 * @property integer $ID_DENUNCIA
 * @property integer $ID_TIPO_DENUNCIA
 * @property string $ID_ESTADO_DENUNCIA
 * @property string $FACULTAD_DENUNCIA
 * @property string $EDIFICIO_DENUNCIA
 * @property string $SALA_DENUNCIA
 * @property string $BLOQUE_DENUNCIA
 * @property string $FECHA_DENUNCIA
 *
 * @property TipoDenuncia $iDTIPODENUNCIA
 * @property EstadoSolicitudDenuncia $iDESTADODENUNCIA
 */
class PostDeDenuncia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_de_denuncia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_DENUNCIA'], 'integer'],
            [['SALA_DENUNCIA', 'BLOQUE_DENUNCIA', 'FECHA_DENUNCIA'], 'required'],
            [['FECHA_DENUNCIA'], 'safe'],
            [['ID_ESTADO_DENUNCIA', 'FACULTAD_DENUNCIA', 'EDIFICIO_DENUNCIA', 'SALA_DENUNCIA', 'BLOQUE_DENUNCIA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DENUNCIA' => 'Id  Denuncia',
            'ID_TIPO_DENUNCIA' => 'Id  Tipo  Denuncia',
            'ID_ESTADO_DENUNCIA' => 'Id  Estado  Denuncia',
            'FACULTAD_DENUNCIA' => 'Facultad  Denuncia',
            'EDIFICIO_DENUNCIA' => 'Edificio  Denuncia',
            'SALA_DENUNCIA' => 'Sala  Denuncia',
            'BLOQUE_DENUNCIA' => 'Bloque  Denuncia',
            'FECHA_DENUNCIA' => 'Fecha  Denuncia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTIPODENUNCIA()
    {
        return $this->hasOne(TipoDenuncia::className(), ['ID_TIPO_DENUNCIA' => 'ID_TIPO_DENUNCIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDESTADODENUNCIA()
    {
        return $this->hasOne(EstadoSolicitudDenuncia::className(), ['ID_ESTADO_DENUNCIA' => 'ID_ESTADO_DENUNCIA']);
    }
}
