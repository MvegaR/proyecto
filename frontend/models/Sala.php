<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sala".
 *
 * @property string $ID_SALA
 * @property integer $ID_TIPO_SALA
 * @property string $ID_EDIFICIO
 * @property integer $CAPACIDAD_SALA
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SALA', 'ID_TIPO_SALA', 'ID_EDIFICIO', 'CAPACIDAD_SALA'], 'required'],
            [['ID_SALA', 'ID_TIPO_SALA', 'CAPACIDAD_SALA'], 'integer', 'min'=>1],
            [['ID_SALA', 'ID_EDIFICIO'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SALA' => 'Id  Sala',
            'ID_TIPO_SALA' => 'Id  Tipo  Sala',
            'ID_EDIFICIO' => 'Id  Edificio',
            'CAPACIDAD_SALA' => 'Capacidad  Sala',
        ];
    }
}
