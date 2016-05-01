<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "edificio".
 *
 * @property string $ID_EDIFICIO
 * @property string $NOMBRE_EDIFICIO
 *
 * @property Facultad[] $facultads
 * @property Sala[] $salas
 */
class Edificio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edificio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'required'],
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_EDIFICIO' => 'Id  Edificio',
            'NOMBRE_EDIFICIO' => 'Nombre  Edificio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultads()
    {
        return $this->hasMany(Facultad::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(Sala::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }
}
