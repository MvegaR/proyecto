<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bloque;

/**
 * BloqueSearch represents the model behind the search form about `frontend\models\Bloque`.
 */
class BloqueSearch extends Bloque
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_BLOQUE', 'ID_DIA', 'BLOQUE_SIGUIENTE'], 'integer'],
            [['ID_SALA', 'ID_SECCION', 'INICIO', 'TERMINO'], 'safe'],
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
        $query = Bloque::find();

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
            'ID_BLOQUE' => $this->ID_BLOQUE,
            'ID_DIA' => $this->ID_DIA,
            'INICIO' => $this->INICIO,
            'TERMINO' => $this->TERMINO,
            'BLOQUE_SIGUIENTE' => $this->BLOQUE_SIGUIENTE,
        ]);

        $query->andFilterWhere(['like', 'ID_SALA', $this->ID_SALA])
            ->andFilterWhere(['like', 'ID_SECCION', $this->ID_SECCION]);

        return $dataProvider;
    }
}
