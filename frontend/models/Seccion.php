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
            [['CUPO'], 'integer'],
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
