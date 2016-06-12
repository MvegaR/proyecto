<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "facultad".
 *
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_FACULTAD
 *
 * @property Carrera[] $carreras
 * @property Departamento[] $departamentos
 * @property Edificio[] $edificios
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
    public function getDepartamentos()
    {
        return $this->hasMany(Departamento::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdificios()
    {
        return $this->hasMany(Edificio::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }
}
