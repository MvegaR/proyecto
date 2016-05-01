<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TipoDenuncia;

/**
 * TipoDenunciaSearch represents the model behind the search form about `frontend\models\TipoDenuncia`.
 */
class TipoDenunciaSearch extends TipoDenuncia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TIPO_DENUNCIA'], 'integer'],
            [['NOMBRE_TIPO_DENUNCIA'], 'safe'],
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
        $query = TipoDenuncia::find();

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
            'ID_TIPO_DENUNCIA' => $this->ID_TIPO_DENUNCIA,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_TIPO_DENUNCIA', $this->NOMBRE_TIPO_DENUNCIA]);

        return $dataProvider;
    }
}
