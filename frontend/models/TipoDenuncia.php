<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipo_denuncia".
 *
 * @property integer $ID_TIPO_DENUNCIA
 * @property string $NOMBRE_TIPO_DENUNCIA
 *
 * @property PostDeDenuncia[] $postDeDenuncias
 */
class TipoDenuncia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_denuncia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_TIPO_DENUNCIA'], 'required'],
            [['NOMBRE_TIPO_DENUNCIA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TIPO_DENUNCIA' => 'Id  Tipo  Denuncia',
            'NOMBRE_TIPO_DENUNCIA' => 'Nombre  Tipo  Denuncia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostDeDenuncias()
    {
        return $this->hasMany(PostDeDenuncia::className(), ['ID_TIPO_DENUNCIA' => 'ID_TIPO_DENUNCIA']);
    }
}
