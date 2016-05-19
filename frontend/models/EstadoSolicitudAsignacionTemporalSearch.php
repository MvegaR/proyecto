<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstadoSolicitudAsignacionTemporal;

/**
 * EstadoSolicitudAsignacionTemporalSearch represents the model behind the search form about `frontend\models\EstadoSolicitudAsignacionTemporal`.
 */
class EstadoSolicitudAsignacionTemporalSearch extends EstadoSolicitudAsignacionTemporal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_ASIGNACION_TEMPORAL'], 'integer'],
            [['NOMBRE_ESTADO_ASIGNACION_TEMPORAL'], 'safe'],
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
        $query = EstadoSolicitudAsignacionTemporal::find();

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
            'ID_ESTADO_ASIGNACION_TEMPORAL' => $this->ID_ESTADO_ASIGNACION_TEMPORAL,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESTADO_ASIGNACION_TEMPORAL', $this->NOMBRE_ESTADO_ASIGNACION_TEMPORAL]);

        return $dataProvider;
    }
}
