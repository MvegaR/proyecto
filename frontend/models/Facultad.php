<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "facultad".
 *
 * @property integer $ID_FACULTAD
 * @property string $ID_EDIFICIO
 * @property string $NOMBRE_FACULTAD
 *
 * @property Carrera[] $carreras
 * @property Docente[] $docentes
 * @property Edificio $iDEDIFICIO
 */
class Facultad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facultad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_FACULTAD'], 'required'],
            [['ID_EDIFICIO', 'NOMBRE_FACULTAD'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_FACULTAD' => 'Id  Facultad',
            'ID_EDIFICIO' => 'Id  Edificio',
            'NOMBRE_FACULTAD' => 'Nombre  Facultad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEDIFICIO()
    {
        return $this->hasOne(Edificio::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }
}
