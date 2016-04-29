<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "edificio".
 *
 * @property string $ID_EDIFICIO
 * @property string $NOMBRE_EDIFICIO
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
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'string', 'max' => 255],
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
}
