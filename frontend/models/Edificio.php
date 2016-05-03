<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "edificio".
 *
 * @property string $ID_EDIFICIO
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_EDIFICIO
 *
 * @property Facultad $iDFACULTAD
 * @property Sala[] $salas
 */
class Edificio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edificio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'required'],
            [['ID_FACULTAD'], 'integer'],
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EDIFICIO' => 'Id  Edificio',
            'ID_FACULTAD' => 'Id  Facultad',
            'NOMBRE_EDIFICIO' => 'Nombre  Edificio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDFACULTAD()
    {
        return $this->hasOne(Facultad::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }
}
