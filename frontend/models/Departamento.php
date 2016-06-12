<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $ID_DEPARTAMENTO
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_DEPARTAMENTO
 *
 * @property Facultad $iDFACULTAD
 * @property Docente[] $docentes
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_FACULTAD'], 'integer'],
            [['NOMBRE_DEPARTAMENTO'], 'required'],
            [['NOMBRE_DEPARTAMENTO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DEPARTAMENTO' => 'Id  Departamento',
            'ID_FACULTAD' => 'Id  Facultad',
            'NOMBRE_DEPARTAMENTO' => 'Nombre  Departamento',
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
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['ID_DEPARTAMENTO' => 'ID_DEPARTAMENTO']);
    }
}
