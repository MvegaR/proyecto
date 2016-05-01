<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bloque".
 *
 * @property integer $ID_BLOQUE
 * @property integer $ID_DIA
 * @property string $ID_SALA
 * @property string $ID_SECCION
 * @property string $INICIO
 * @property string $TERMINO
 * @property integer $BLOQUE_SIGUIENTE
 *
 * @property Dia $iDDIA
 * @property Sala $iDSALA
 * @property Seccion $iDSECCION
 */
class Bloque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bloque';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DIA', 'BLOQUE_SIGUIENTE'], 'integer'],
            [['INICIO', 'TERMINO'], 'required'],
            [['INICIO', 'TERMINO'], 'safe'],
            [['ID_SALA', 'ID_SECCION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_BLOQUE' => 'Id  Bloque',
            'ID_DIA' => 'Id  Dia',
            'ID_SALA' => 'Id  Sala',
            'ID_SECCION' => 'Id  Seccion',
            'INICIO' => 'Inicio',
            'TERMINO' => 'Termino',
            'BLOQUE_SIGUIENTE' => 'Bloque  Siguiente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDIA()
    {
        return $this->hasOne(Dia::className(), ['ID_DIA' => 'ID_DIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDSALA()
    {
        return $this->hasOne(Sala::className(), ['ID_SALA' => 'ID_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDSECCION()
    {
        return $this->hasOne(Seccion::className(), ['ID_SECCION' => 'ID_SECCION']);
    }
}
