<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property integer $ID_ROL
 * @property string $NOMBRE_ROL
 *
 * @property Docente[] $docentes
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_ROL'], 'required'],
            [['NOMBRE_ROL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ROL' => 'Id  Rol',
            'NOMBRE_ROL' => 'Nombre  Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['ID_ROL' => 'ID_ROL']);
    }
}
