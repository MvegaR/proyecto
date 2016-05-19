<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $ID_DEPARTAMENTO
 * @property string $NOMBRE_DEPARTAMENTO
 *
 * @property Facultad[] $facultads
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
            'NOMBRE_DEPARTAMENTO' => 'Nombre  Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultads()
    {
        return $this->hasMany(Facultad::className(), ['ID_DEPARTAMENTO' => 'ID_DEPARTAMENTO']);
    }
}
