<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Seccion;

/**
 * SeccionSearch represents the model behind the search form about `frontend\models\Seccion`.
 */
class SeccionSearch extends Seccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SECCION', 'ID_DOCENTE', 'ID_ASIGNATURA'], 'safe'],
            [['CUPO', 'HORAS_TEO', 'HORAS_LAB', 'HORAS_AYUDANTIA'], 'integer'],
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
        $query = Seccion::find();

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
            'CUPO' => $this->CUPO,
            'HORAS_TEO' => $this->HORAS_TEO,
            'HORAS_LAB' => $this->HORAS_LAB,
            'HORAS_AYUDANTIA' => $this->HORAS_AYUDANTIA,
        ]);

        $query->andFilterWhere(['like', 'ID_SECCION', $this->ID_SECCION])
            ->andFilterWhere(['like', 'ID_DOCENTE', $this->ID_DOCENTE])
            ->andFilterWhere(['like', 'ID_ASIGNATURA', $this->ID_ASIGNATURA]);

        return $dataProvider;
    }
}
