<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstadoSolicitudAsignacion;

/**
 * EstadoSolicitudAsignacionoSearch represents the model behind the search form about `frontend\models\EstadoSolicitudAsignacion`.
 */
class EstadoSolicitudAsignacionoSearch extends EstadoSolicitudAsignacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_SOLICITUD'], 'integer'],
            [['NOMBRE_ESTADO'], 'safe'],
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
        $query = EstadoSolicitudAsignacion::find();

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
            'ID_ESTADO_SOLICITUD' => $this->ID_ESTADO_SOLICITUD,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESTADO', $this->NOMBRE_ESTADO]);

        return $dataProvider;
    }
}
