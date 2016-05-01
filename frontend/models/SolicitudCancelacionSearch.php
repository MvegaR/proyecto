<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolicitudCancelacion;

/**
 * SolicitudCancelacionSearch represents the model behind the search form about `frontend\models\SolicitudCancelacion`.
 */
class SolicitudCancelacionSearch extends SolicitudCancelacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_CANCELACION', 'ID_ESTADO_CANCELACION', 'BLOQUE_CANCELACION'], 'integer'],
            [['DOCENTE_CANCELACION', 'ASIGNATURA_CANCELACION', 'SECCION_CANCELACION', 'MOTIVO'], 'safe'],
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
        $query = SolicitudCancelacion::find();

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
            'ID_CANCELACION' => $this->ID_CANCELACION,
            'ID_ESTADO_CANCELACION' => $this->ID_ESTADO_CANCELACION,
            'BLOQUE_CANCELACION' => $this->BLOQUE_CANCELACION,
        ]);

        $query->andFilterWhere(['like', 'DOCENTE_CANCELACION', $this->DOCENTE_CANCELACION])
            ->andFilterWhere(['like', 'ASIGNATURA_CANCELACION', $this->ASIGNATURA_CANCELACION])
            ->andFilterWhere(['like', 'SECCION_CANCELACION', $this->SECCION_CANCELACION])
            ->andFilterWhere(['like', 'MOTIVO', $this->MOTIVO]);

        return $dataProvider;
    }
}
