<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstadoSolicitudCambio;

/**
 * EstadoSolicitudCambioSearch represents the model behind the search form about `frontend\models\EstadoSolicitudCambio`.
 */
class EstadoSolicitudCambioSearch extends EstadoSolicitudCambio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_CAMBIO'], 'integer'],
            [['NOMBRE_ESTADO_CAMBIO'], 'safe'],
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
        $query = EstadoSolicitudCambio::find();

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
            'ID_ESTADO_CAMBIO' => $this->ID_ESTADO_CAMBIO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESTADO_CAMBIO', $this->NOMBRE_ESTADO_CAMBIO]);

        return $dataProvider;
    }
}
