<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolicitudCambio;

/**
 * SolicitudCambioSearch represents the model behind the search form about `frontend\models\SolicitudCambio`.
 */
class SolicitudCambioSearch extends SolicitudCambio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CAMBIO', 'ID_ESTADO_CAMBIO', 'CAPACIDAD_CAMBIO'], 'integer'],
            [['ASIGNATURA_CAMBIO', 'SECCION_CAMBIO', 'SALA_CAMBIO', 'DOCENTE_CAMBIO'], 'safe'],
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
        $query = SolicitudCambio::find();

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
            'ID_CAMBIO' => $this->ID_CAMBIO,
            'ID_ESTADO_CAMBIO' => $this->ID_ESTADO_CAMBIO,
            'CAPACIDAD_CAMBIO' => $this->CAPACIDAD_CAMBIO,
        ]);

        $query->andFilterWhere(['like', 'ASIGNATURA_CAMBIO', $this->ASIGNATURA_CAMBIO])
            ->andFilterWhere(['like', 'SECCION_CAMBIO', $this->SECCION_CAMBIO])
            ->andFilterWhere(['like', 'SALA_CAMBIO', $this->SALA_CAMBIO])
            ->andFilterWhere(['like', 'DOCENTE_CAMBIO', $this->DOCENTE_CAMBIO]);

        return $dataProvider;
    }
}
