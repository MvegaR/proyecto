<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property string $ID_SECCION
 * @property string $ID_DOCENTE
 * @property string $ID_ASIGNATURA
 * @property integer $CUPO
 * @property integer $HORAS_TEO
 * @property integer $HORAS_LAB
 * @property integer $HORAS_AYUDANTIA
 * @property integer $HORA_LAB_FISICA
 * @property integer $HORA_LAB_QUIMICA
 * @property integer $HORA_LAB_ROBOTICA
 * @property integer $HORA_LAB_MECANICA
 * @property integer $HORA_TALLER_ARQUITECTURA
 * @property integer $HORA_TALLER_MADERA
 * @property integer $HORAS_GYM
 * @property integer $HORAS_AUDITORIO
 *
 * @property Bloque[] $bloques
 * @property Docente $iDDOCENTE
 * @property Asignatura $iDASIGNATURA
 */
class Seccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SECCION', 'CUPO'], 'required'],
            [['CUPO', 'HORAS_TEO', 'HORAS_LAB', 'HORAS_AYUDANTIA', 'HORA_LAB_FISICA', 'HORA_LAB_QUIMICA', 'HORA_LAB_ROBOTICA', 'HORA_LAB_MECANICA', 'HORA_TALLER_ARQUITECTURA', 'HORA_TALLER_MADERA', 'HORAS_GYM', 'HORAS_AUDITORIO'], 'integer'],
            [['ID_SECCION', 'ID_DOCENTE', 'ID_ASIGNATURA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SECCION' => 'Id  Seccion',
            'ID_DOCENTE' => 'Id  Docente',
            'ID_ASIGNATURA' => 'Id  Asignatura',
            'CUPO' => 'Cupo',
            'HORAS_TEO' => 'Horas  Teo',
            'HORAS_LAB' => 'Horas  Lab',
            'HORAS_AYUDANTIA' => 'Horas  Ayudantia',
            'HORA_LAB_FISICA' => 'Hora  Lab  Fisica',
            'HORA_LAB_QUIMICA' => 'Hora  Lab  Quimica',
            'HORA_LAB_ROBOTICA' => 'Hora  Lab  Robotica',
            'HORA_LAB_MECANICA' => 'Hora  Lab  Mecanica',
            'HORA_TALLER_ARQUITECTURA' => 'Hora  Taller  Arquitectura',
            'HORA_TALLER_MADERA' => 'Hora  Taller  Madera',
            'HORAS_GYM' => 'Horas  Gym',
            'HORAS_AUDITORIO' => 'Horas  Auditorio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloques()
    {
        return $this->hasMany(Bloque::className(), ['ID_SECCION' => 'ID_SECCION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDOCENTE()
    {
        return $this->hasOne(Docente::className(), ['ID_DOCENTE' => 'ID_DOCENTE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDASIGNATURA()
    {
        return $this->hasOne(Asignatura::className(), ['ID_ASIGNATURA' => 'ID_ASIGNATURA']);
    }
}
