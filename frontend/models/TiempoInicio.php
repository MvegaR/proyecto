<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tiempo_inicio".
 *
 * @property string $TIEMPO
 */
class TiempoInicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiempo_inicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIEMPO'], 'required'],
            [['TIEMPO'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TIEMPO' => 'Tiempo',
        ];
    }
}
