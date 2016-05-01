<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstadoSolicitudDenuncia;

/**
 * EstadoSolicitudDenunciaSearch represents the model behind the search form about `frontend\models\EstadoSolicitudDenuncia`.
 */
class EstadoSolicitudDenunciaSearch extends EstadoSolicitudDenuncia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_DENUNCIA', 'NOMBRE_DENUNCIA'], 'safe'],
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
        $query = EstadoSolicitudDenuncia::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'ID_ESTADO_DENUNCIA', $this->ID_ESTADO_DENUNCIA])
            ->andFilterWhere(['like', 'NOMBRE_DENUNCIA', $this->NOMBRE_DENUNCIA]);

        return $dataProvider;
    }
}
