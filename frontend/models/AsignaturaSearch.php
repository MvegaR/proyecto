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
            [['ANIO', 'SEMESTRE'], 'integer'],
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
        ]);

        $query->andFilterWhere(['like', 'ID_ASIGNATURA', $this->ID_ASIGNATURA])
            ->andFilterWhere(['like', 'ID_CARRERA', $this->ID_CARRERA])
            ->andFilterWhere(['like', 'NOMBRE_ASIGNATURA', $this->NOMBRE_ASIGNATURA]);

        return $dataProvider;
    }
}
