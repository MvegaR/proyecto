<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "estado_solicitud_denuncia".
 *
 * @property integer $ID_ESTADO_DENUNCIA
 * @property string $NOMBRE_DENUNCIA
 *
 * @property PostDeDenuncia[] $postDeDenuncias
 */
class EstadoSolicitudDenuncia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_solicitud_denuncia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE_DENUNCIA'], 'required'],
            [['NOMBRE_DENUNCIA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ESTADO_DENUNCIA' => 'Id  Estado  Denuncia',
            'NOMBRE_DENUNCIA' => 'Nombre  Denuncia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostDeDenuncias()
    {
        return $this->hasMany(PostDeDenuncia::className(), ['ID_ESTADO_DENUNCIA' => 'ID_ESTADO_DENUNCIA']);
    }
}
