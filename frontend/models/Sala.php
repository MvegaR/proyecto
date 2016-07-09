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
 *
 * @property Bloque[] $bloques
 * @property TipoSala $iDTIPOSALA
 * @property Edificio $iDEDIFICIO
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
            [['ID_SALA', 'CAPACIDAD_SALA'], 'required'],
            [['ID_TIPO_SALA', 'CAPACIDAD_SALA'], 'integer'],
            [['ID_SALA', 'ID_EDIFICIO', "MUEBLE"], 'string', 'max' => 255],

            [['ID_SALA'],'unique']
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloques()
    {
        return $this->hasMany(Bloque::className(), ['ID_SALA' => 'ID_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTIPOSALA()
    {
        return $this->hasOne(TipoSala::className(), ['ID_TIPO_SALA' => 'ID_TIPO_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDEDIFICIO()
    {
        return $this->hasOne(Edificio::className(), ['ID_EDIFICIO' => 'ID_EDIFICIO']);
    }
    
    public static function getSalasDisponiblesSegunDiaHora($dia,$hora){
        $sql = 'SELECT s.ID_SALA, s.ID_EDIFICIO, s.CAPACIDAD_SALA 
                FROM sala s,  bloque b
                WHERE b.ID_DIA ='.$dia.' AND b.ID_SECCION IS NULL AND b.INICIO = "'.$hora.'" AND  s.ID_SALA = b.ID_SALA';
        $result = Sala::findBySql($sql)->all();
        return $result;
    }
    
}
