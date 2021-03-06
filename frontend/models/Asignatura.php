<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asignatura".
 *
 * @property string $ID_ASIGNATURA
 * @property string $ID_CARRERA
 * @property string $NOMBRE_ASIGNATURA
 * @property integer $ANIO
 * @property integer $SEMESTRE
 * @property integer $HORAS_TEO
 * @property integer $HORAS_LAB_COM
 * @property integer $HORAS_AYUDANTIA
 * @property integer $HORAS_LAB_FISICA
 * @property integer $HORAS_LAB_QUIMICA
 * @property integer $HORAS_LAB_ROBOTICA
 * @property integer $HORAS_LAB_MECANICA
 * @property integer $HORAS_TALLER_ARQUITECTURA
 * @property integer $HORAS_TALLER_MADERA
 * @property integer $HORAS_GYM
 * @property integer $HORAS_AUDITORIO
 *
 * @property Carrera $iDCARRERA
 * @property Seccion[] $seccions
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ASIGNATURA', 'NOMBRE_ASIGNATURA', 'ANIO', 'SEMESTRE'], 'required'],
            [['ANIO', 'SEMESTRE', 'HORAS_TEO', 'HORAS_LAB_COM', 'HORAS_AYUDANTIA', 'HORAS_LAB_FISICA', 'HORAS_LAB_QUIMICA', 'HORAS_LAB_ROBOTICA', 'HORAS_LAB_MECANICA', 'HORAS_TALLER_ARQUITECTURA', 'HORAS_TALLER_MADERA', 'HORAS_GYM', 'HORAS_AUDITORIO'], 'integer'],
            [['ID_ASIGNATURA'],'unique'],
            [['ID_ASIGNATURA', 'ID_CARRERA', 'NOMBRE_ASIGNATURA'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ASIGNATURA' => 'Id Asignatura',
            'ID_CARRERA' => 'Id Carrera',
            'NOMBRE_ASIGNATURA' => 'Nombre Asignatura',
            'ANIO' => 'Año',
            'SEMESTRE' => 'Semestre',
            'HORAS_TEO' => 'Horas Teoricas',
            'HORAS_LAB_COM' => 'Horas Lab Computacion',
            'HORAS_AYUDANTIA' => 'Horas Ayudantia',
            'HORAS_LAB_FISICA' => 'Horas Lab Fisica',
            'HORAS_LAB_QUIMICA' => 'Horas Lab Quimica',
            'HORAS_LAB_ROBOTICA' => 'Horas Lab Robotica',
            'HORAS_LAB_MECANICA' => 'Horas Lab Mecanica',
            'HORAS_TALLER_ARQUITECTURA' => 'Horas Taller Arquitectura',
            'HORAS_TALLER_MADERA' => 'Horas Taller Madera',
            'HORAS_GYM' => 'Horas Gym',
            'HORAS_AUDITORIO' => 'Horas Auditorio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDCARRERA()
    {
        return $this->hasOne(Carrera::className(), ['ID_CARRERA' => 'ID_CARRERA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['ID_ASIGNATURA' => 'ID_ASIGNATURA']);
    }

         public function getHORARIOALUMNO($dia, $hora, $carrera, $anio, $semestre)
    {




        $sql = "Select a.NOMBRE_ASIGNATURA, c.ID_CARRERA, b.ID_SALA, b.ID_SECCION, s.CUPO, sa.CAPACIDAD_SALA
                from asignatura a, carrera c, bloque b, seccion s, sala sa
                where b.ID_DIA = $dia and b.INICIO = '$hora' and c.ID_CARRERA = '$carrera' and a.ANIO = $anio and a.SEMESTRE = $semestre and a.ID_CARRERA = '$carrera' and s.ID_SECCION = b.ID_SECCION and s.ID_ASIGNATURA = a.ID_ASIGNATURA and a.ID_CARRERA = c.ID_CARRERA and sa.ID_SALA = b.ID_SALA

                        ";

           // echo "<br><br><br><br><br>$sql<br><br><br>";
                    
            $command = Yii::$app -> db -> createCommand($sql);
            $dataReader = $command->queryAll();
            return $dataReader;
    }
}
