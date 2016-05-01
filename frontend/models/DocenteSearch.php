<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Docente;

/**
 * DocenteSearch represents the model behind the search form about `frontend\models\Docente`.
 */
class DocenteSearch extends Docente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DOCENTE', 'NOMBRE_DOCENTE', 'EMAIL', 'USER', 'PASSWORD', 'COOKIE'], 'safe'],
            [['ID_ROL', 'ID_FACULTAD'], 'integer'],
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
        $query = Docente::find();

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
            'ID_ROL' => $this->ID_ROL,
            'ID_FACULTAD' => $this->ID_FACULTAD,
        ]);

        $query->andFilterWhere(['like', 'ID_DOCENTE', $this->ID_DOCENTE])
            ->andFilterWhere(['like', 'NOMBRE_DOCENTE', $this->NOMBRE_DOCENTE])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'USER', $this->USER])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'COOKIE', $this->COOKIE]);

        return $dataProvider;
    }
}
