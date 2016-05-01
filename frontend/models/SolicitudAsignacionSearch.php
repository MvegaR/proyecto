<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolicitudAsignacion;

/**
 * SolicitudAsignacionSearch represents the model behind the search form about `frontend\models\SolicitudAsignacion`.
 */
class SolicitudAsignacionSearch extends SolicitudAsignacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ASIGNACION', 'ID_ESTADO_SOLICITUD', 'CAPACIDAD_ASIGNACION', 'TIPO_SALA_ASIGNACION'], 'integer'],
            [['DOCENTE_ASIGNACION', 'ASIGNATURA_ASIGNACION', 'SECCION_ASIGNACION'], 'safe'],
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
        $query = SolicitudAsignacion::find();

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
            'ID_ASIGNACION' => $this->ID_ASIGNACION,
            'ID_ESTADO_SOLICITUD' => $this->ID_ESTADO_SOLICITUD,
            'CAPACIDAD_ASIGNACION' => $this->CAPACIDAD_ASIGNACION,
            'TIPO_SALA_ASIGNACION' => $this->TIPO_SALA_ASIGNACION,
        ]);

        $query->andFilterWhere(['like', 'DOCENTE_ASIGNACION', $this->DOCENTE_ASIGNACION])
            ->andFilterWhere(['like', 'ASIGNATURA_ASIGNACION', $this->ASIGNATURA_ASIGNACION])
            ->andFilterWhere(['like', 'SECCION_ASIGNACION', $this->SECCION_ASIGNACION]);

        return $dataProvider;
    }
}
