<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "facultad".
 *
 * @property integer $ID_FACULTAD
 * @property integer $ID_DEPARTAMENTO
 * @property string $NOMBRE_FACULTAD
 *
 * @property Carrera[] $carreras
 * @property Docente[] $docentes
 * @property Edificio[] $edificios
 * @property Departamento $iDDEPARTAMENTO
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
            [['ID_DEPARTAMENTO'], 'integer'],
            [['NOMBRE_FACULTAD'], 'required'],
            [['NOMBRE_FACULTAD'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_FACULTAD' => 'Id  Facultad',
            'ID_DEPARTAMENTO' => 'Id  Departamento',
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
    public function getEdificios()
    {
        return $this->hasMany(Edificio::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDEPARTAMENTO()
    {
        return $this->hasOne(Departamento::className(), ['ID_DEPARTAMENTO' => 'ID_DEPARTAMENTO']);
    }
}
