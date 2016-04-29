<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_sala".
 *
 * @property integer $ID_TIPO_SALA
 * @property string $NOMBRE_TIPO
 */
class TipoSala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_TIPO'], 'required'],
            [['NOMBRE_TIPO'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TIPO_SALA' => 'Id  Tipo  Sala',
            'NOMBRE_TIPO' => 'Nombre  Tipo',
        ];
    }
}
