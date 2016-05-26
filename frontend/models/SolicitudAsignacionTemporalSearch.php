<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolicitudAsignacionTemporal;

/**
 * SolicitudAsignacionTemporalSearch represents the model behind the search form about `frontend\models\SolicitudAsignacionTemporal`.
 */
class SolicitudAsignacionTemporalSearch extends SolicitudAsignacionTemporal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ASIGNACION_TEMPORAL', 'ID_ESTADO_ASIGNACION_TEMPORAL', 'CAPACIDAD_ASIGNACION_TEMPORAL', 'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL', 'INICIO_BLOQUE_ASIGNACION_TEMPORAL', 'TIPO_SALA_ASIGNACION_TEMPORAL'], 'integer'],
            [['DOCENTE_ASIGNACION_TEMPORAL', 'SALA_ASIGNACION_TEMPORAL', 'FECHA_ASIGNACION_TEMPORAL'], 'safe'],
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
        $query = SolicitudAsignacionTemporal::find();

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
            'ID_ASIGNACION_TEMPORAL' => $this->ID_ASIGNACION_TEMPORAL,
            'ID_ESTADO_ASIGNACION_TEMPORAL' => $this->ID_ESTADO_ASIGNACION_TEMPORAL,
            'CAPACIDAD_ASIGNACION_TEMPORAL' => $this->CAPACIDAD_ASIGNACION_TEMPORAL,
            'FECHA_ASIGNACION_TEMPORAL' => $this->FECHA_ASIGNACION_TEMPORAL,
            'CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL' => $this->CANTIDAD_BLOQUES_ASIGNACION_TEMPORAL,
            'INICIO_BLOQUE_ASIGNACION_TEMPORAL' => $this->INICIO_BLOQUE_ASIGNACION_TEMPORAL,
            'TIPO_SALA_ASIGNACION_TEMPORAL' => $this->TIPO_SALA_ASIGNACION_TEMPORAL,
        ]);

        $query->andFilterWhere(['like', 'DOCENTE_ASIGNACION_TEMPORAL', $this->DOCENTE_ASIGNACION_TEMPORAL])
            ->andFilterWhere(['like', 'SALA_ASIGNACION_TEMPORAL', $this->SALA_ASIGNACION_TEMPORAL]);

        return $dataProvider;
    }
}
