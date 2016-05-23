<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bloque".
 *
 * @property integer $ID_BLOQUE
 * @property integer $ID_DIA
 * @property string $ID_SALA
 * @property string $ID_SECCION
 * @property string $INICIO
 * @property string $TERMINO
 * @property integer $BLOQUE_SIGUIENTE
 *
 * @property Dia $iDDIA
 * @property Sala $iDSALA
 * @property Seccion $iDSECCION
 */
class Bloque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bloque';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DIA', 'BLOQUE_SIGUIENTE'], 'integer'],
            [['INICIO', 'TERMINO'], 'required'],
            [['INICIO', 'TERMINO'], 'safe'],
            [['ID_SALA', 'ID_SECCION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_BLOQUE' => 'Id  Bloque',
            'ID_DIA' => 'Id  Dia',
            'ID_SALA' => 'Id  Sala',
            'ID_SECCION' => 'Id  Seccion',
            'INICIO' => 'Inicio',
            'TERMINO' => 'Termino',
            'BLOQUE_SIGUIENTE' => 'Bloque  Siguiente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDDIA()
    {
        return $this->hasOne(Dia::className(), ['ID_DIA' => 'ID_DIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDSALA()
    {
        return $this->hasOne(Sala::className(), ['ID_SALA' => 'ID_SALA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDSECCION()
    {
        return $this->hasOne(Seccion::className(), ['ID_SECCION' => 'ID_SECCION']);
    }
    
    public function getHorariosOcupados(){
        $query = Bloque::find()->filterWhere(array(
                'condition'=>'postID IS NULL',
            ));
    }
    
    //Retorna los bloques que no han sido asignados a ninguna sala
    public static function getBloquesNulos(){
        $sql = 'SELECT *
                FROM bloque';
        $model = Bloque::findBySql($sql)->all();
        return $model;
    }
    
    //Retorna la cantidad de salas libres que hay en un bloque
    public static function getCantidadBloquesLibresSegunDiaHora($dia,$hora){
        $sql = 'SELECT COUNT(*) AS ID_BLOQUE
                FROM bloque 
                WHERE INICIO = "'.$hora.'" AND ID_DIA = '.$dia.' AND ID_SECCION IS NULL';
        $result = Bloque::findBySql($sql)->all();
        foreach($result as $row){
            return $row->ID_BLOQUE;
        }
        return $result;
    }
    
}
