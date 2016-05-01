<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dia".
 *
 * @property integer $ID_DIA
 * @property string $NOMBRE
 *
 * @property Bloque[] $bloques
 */
class Dia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'required'],
            [['NOMBRE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DIA' => 'Id  Dia',
            'NOMBRE' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloques()
    {
        return $this->hasMany(Bloque::className(), ['ID_DIA' => 'ID_DIA']);
    }
}
