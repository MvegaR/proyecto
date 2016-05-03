<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Edificio;

/**
 * EdificioSearch represents the model behind the search form about `frontend\models\Edificio`.
 */
class EdificioSearch extends Edificio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_EDIFICIO', 'NOMBRE_EDIFICIO'], 'safe'],
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
        $query = Edificio::find();

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

        $query->andFilterWhere(['like', 'ID_EDIFICIO', $this->ID_EDIFICIO])
            ->andFilterWhere(['like', 'NOMBRE_EDIFICIO', $this->NOMBRE_EDIFICIO]);

        return $dataProvider;
    }
}
