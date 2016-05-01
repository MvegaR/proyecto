<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TipoSala;

/**
 * TipoSalaSearch represents the model behind the search form about `frontend\models\TipoSala`.
 */
class TipoSalaSearch extends TipoSala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_SALA'], 'integer'],
            [['NOMBRE_TIPO'], 'safe'],
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
        $query = TipoSala::find();

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
            'ID_TIPO_SALA' => $this->ID_TIPO_SALA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_TIPO', $this->NOMBRE_TIPO]);

        return $dataProvider;
    }
}
