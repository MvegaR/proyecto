<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Asignatura;

/**
 * AsignaturaSearch represents the model behind the search form about `frontend\models\Asignatura`.
 */
class AsignaturaSearch extends Asignatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ASIGNATURA', 'ID_CARRERA', 'NOMBRE_ASIGNATURA'], 'safe'],
            [['ANIO', 'SEMESTRE', 'HORAS_TEO', 'HORAS_LAB_COM', 'HORAS_AYUDANTIA', 'HORAS_LAB_FISICA', 'HORAS_LAB_QUIMICA', 'HORAS_LAB_ROBOTICA', 'HORAS_LAB_MECANICA', 'HORAS_TALLER_ARQUITECTURA', 'HORAS_TALLER_MADERA', 'HORAS_GYM', 'HORAS_AUDITORIO'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Asignatura::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ANIO' => $this->ANIO,
            'SEMESTRE' => $this->SEMESTRE,
            'HORAS_TEO' => $this->HORAS_TEO,
            'HORAS_LAB_COM' => $this->HORAS_LAB_COM,
            'HORAS_AYUDANTIA' => $this->HORAS_AYUDANTIA,
            'HORAS_LAB_FISICA' => $this->HORAS_LAB_FISICA,
            'HORAS_LAB_QUIMICA' => $this->HORAS_LAB_QUIMICA,
            'HORAS_LAB_ROBOTICA' => $this->HORAS_LAB_ROBOTICA,
            'HORAS_LAB_MECANICA' => $this->HORAS_LAB_MECANICA,
            'HORAS_TALLER_ARQUITECTURA' => $this->HORAS_TALLER_ARQUITECTURA,
            'HORAS_TALLER_MADERA' => $this->HORAS_TALLER_MADERA,
            'HORAS_GYM' => $this->HORAS_GYM,
            'HORAS_AUDITORIO' => $this->HORAS_AUDITORIO,
        ]);

        $query->andFilterWhere(['like', 'ID_ASIGNATURA', $this->ID_ASIGNATURA])
            ->andFilterWhere(['like', 'ID_CARRERA', $this->ID_CARRERA])
            ->andFilterWhere(['like', 'NOMBRE_ASIGNATURA', $this->NOMBRE_ASIGNATURA]);

        return $dataProvider;
    }
}
