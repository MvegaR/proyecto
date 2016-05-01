<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property string $ID_DOCENTE
 * @property integer $ID_ROL
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_DOCENTE
 * @property string $EMAIL
 * @property string $USER
 * @property string $PASSWORD
 * @property string $COOKIE
 *
 * @property Rol $iDROL
 * @property Facultad $iDFACULTAD
 * @property Seccion[] $seccions
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCENTE', 'NOMBRE_DOCENTE'], 'required'],
            [['ID_ROL', 'ID_FACULTAD'], 'integer'],
            [['ID_DOCENTE', 'NOMBRE_DOCENTE', 'EMAIL', 'USER', 'PASSWORD', 'COOKIE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DOCENTE' => 'Id  Docente',
            'ID_ROL' => 'Id  Rol',
            'ID_FACULTAD' => 'Id  Facultad',
            'NOMBRE_DOCENTE' => 'Nombre  Docente',
            'EMAIL' => 'Email',
            'USER' => 'User',
            'PASSWORD' => 'Password',
            'COOKIE' => 'Cookie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDROL()
    {
        return $this->hasOne(Rol::className(), ['ID_ROL' => 'ID_ROL']);
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
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['ID_DOCENTE' => 'ID_DOCENTE']);
    }
}
