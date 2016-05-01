<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dia;

/**
 * DiaSearch represents the model behind the search form about `frontend\models\Dia`.
 */
class DiaSearch extends Dia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DIA'], 'integer'],
            [['NOMBRE'], 'safe'],
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
        $query = Dia::find();

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
            'ID_DIA' => $this->ID_DIA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE]);

        return $dataProvider;
    }
}
