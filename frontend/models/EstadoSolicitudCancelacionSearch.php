<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EstadoSolicitudCancelacion;

/**
 * EstadoSolicitudCancelacionSearch represents the model behind the search form about `frontend\models\EstadoSolicitudCancelacion`.
 */
class EstadoSolicitudCancelacionSearch extends EstadoSolicitudCancelacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_CANCELACION'], 'integer'],
            [['NOMBRE_ESTADO_CANCELACION'], 'safe'],
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
        $query = EstadoSolicitudCancelacion::find();

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
            'ID_ESTADO_CANCELACION' => $this->ID_ESTADO_CANCELACION,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_ESTADO_CANCELACION', $this->NOMBRE_ESTADO_CANCELACION]);

        return $dataProvider;
    }
}
