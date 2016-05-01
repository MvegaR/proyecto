<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PostDeDenuncia;

/**
 * PostDeDenunciaSearch represents the model behind the search form about `frontend\models\PostDeDenuncia`.
 */
class PostDeDenunciaSearch extends PostDeDenuncia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DENUNCIA', 'ID_TIPO_DENUNCIA'], 'integer'],
            [['ID_ESTADO_DENUNCIA', 'FACULTAD_DENUNCIA', 'EDIFICIO_DENUNCIA', 'SALA_DENUNCIA', 'BLOQUE_DENUNCIA', 'FECHA_DENUNCIA'], 'safe'],
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
        $query = PostDeDenuncia::find();

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
            'ID_DENUNCIA' => $this->ID_DENUNCIA,
            'ID_TIPO_DENUNCIA' => $this->ID_TIPO_DENUNCIA,
            'FECHA_DENUNCIA' => $this->FECHA_DENUNCIA,
        ]);

        $query->andFilterWhere(['like', 'ID_ESTADO_DENUNCIA', $this->ID_ESTADO_DENUNCIA])
            ->andFilterWhere(['like', 'FACULTAD_DENUNCIA', $this->FACULTAD_DENUNCIA])
            ->andFilterWhere(['like', 'EDIFICIO_DENUNCIA', $this->EDIFICIO_DENUNCIA])
            ->andFilterWhere(['like', 'SALA_DENUNCIA', $this->SALA_DENUNCIA])
            ->andFilterWhere(['like', 'BLOQUE_DENUNCIA', $this->BLOQUE_DENUNCIA]);

        return $dataProvider;
    }
}
