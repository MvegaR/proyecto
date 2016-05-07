<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asignatura".
 *
 * @property string $ID_ASIGNATURA
 * @property string $ID_CARRERA
 * @property string $NOMBRE_ASIGNATURA
 * @property integer $ANIO
 * @property integer $SEMESTRE
 *
 * @property Carrera $iDCARRERA
 * @property Seccion[] $seccions
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ASIGNATURA', 'NOMBRE_ASIGNATURA', 'ANIO', 'SEMESTRE'], 'required'],
            [['ANIO', 'SEMESTRE'], 'integer'],
            [['ID_ASIGNATURA', 'ID_CARRERA', 'NOMBRE_ASIGNATURA'], 'string', 'max' => 255],
            [['ID_ASIGNATURA'],'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ASIGNATURA' => 'Código Asignatura',
            'ID_CARRERA' => 'Carrera',
            'NOMBRE_ASIGNATURA' => 'Nombre  Asignatura',
            'ANIO' => 'Año',
            'SEMESTRE' => 'Semestre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCARRERA()
    {
        return $this->hasOne(Carrera::className(), ['ID_CARRERA' => 'ID_CARRERA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['ID_ASIGNATURA' => 'ID_ASIGNATURA']);
    }
}
