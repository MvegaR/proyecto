<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sala".
 *
 * @property string $ID_SALA
 * @property integer $ID_TIPO_SALA
 * @property string $ID_EDIFICIO
 * @property integer $CAPACIDAD_SALA
 *
 * @property Bloque[] $bloques
 * @property TipoSala $iDTIPOSALA
 * @property Edificio $iDEDIFICIO
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SALA', 'CAPACIDAD_SALA'], 'required'],
            [['ID_TIPO_SALA', 'CAPACIDAD_SALA'], 'integer'],
            [['ID_SALA', 'ID_EDIFICIO'], 'string', 'max' => 255],
            [['ID_SALA'],'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SALA' => 'Id  Sala',
            'ID_TIPO_SALA' => 'Id  Tipo  Sala',
            'ID_EDIFICIO' => 'Id  Edificio',
            'CAPACIDAD_SALA' => 'Capacidad  Sala',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloques()
    {
        return $this->hasMany(Bloque::className(), ['ID_SALA' => 'ID_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTIPOSALA()
    {
        return $this->hasOne(TipoSala::className(), ['ID_TIPO_SALA' => 'ID_TIPO_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEDIFICIO()
    {
        return $this->hasOne(Edificio::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }
}
