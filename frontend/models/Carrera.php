<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property string $ID_CARRERA
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_CARRERA
 *
 * @property Asignatura[] $asignaturas
 * @property Facultad $iDFACULTAD
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CARRERA', 'NOMBRE_CARRERA'], 'required'],
            [['ID_FACULTAD'], 'integer'],
            [['ID_CARRERA', 'NOMBRE_CARRERA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_CARRERA' => 'Id  Carrera',
            'ID_FACULTAD' => 'Id  Facultad',
            'NOMBRE_CARRERA' => 'Nombre  Carrera',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturas()
    {
        return $this->hasMany(Asignatura::className(), ['ID_CARRERA' => 'ID_CARRERA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDFACULTAD()
    {
        return $this->hasOne(Facultad::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }
}
