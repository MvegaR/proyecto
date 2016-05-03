<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Facultad;

/**
 * FacultadSearch represents the model behind the search form about `frontend\models\Facultad`.
 */
class FacultadSearch extends Facultad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_FACULTAD'], 'integer'],
            [['NOMBRE_FACULTAD'], 'safe'],
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
        $query = Facultad::find();

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
            'ID_FACULTAD' => $this->ID_FACULTAD,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_FACULTAD', $this->NOMBRE_FACULTAD]);

        return $dataProvider;
    }
}
