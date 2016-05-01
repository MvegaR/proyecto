<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Carrera;

/**
 * CarreraSearch represents the model behind the search form about `frontend\models\Carrera`.
 */
class CarreraSearch extends Carrera
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CARRERA', 'NOMBRE_CARRERA'], 'safe'],
            [['ID_FACULTAD'], 'integer'],
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
        $query = Carrera::find();

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

        $query->andFilterWhere(['like', 'ID_CARRERA', $this->ID_CARRERA])
            ->andFilterWhere(['like', 'NOMBRE_CARRERA', $this->NOMBRE_CARRERA]);

        return $dataProvider;
    }
}
