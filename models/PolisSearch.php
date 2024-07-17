<?php

namespace app\models;

// use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Polis;

/**
 * PolisSearch represents the model behind the search form of `app\models\Polis`.
 */
class PolisSearch extends Polis
{
    /**
     * {@inheritdoc}
     */
    public $searchTerm;
    public function rules()
    {
        return [
            [['id', 'nama_poliklinik'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // public function scenarios()
    // {
    //     // bypass scenarios() implementation in the parent class
    //     return Model::scenarios();
    // }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Polis::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Apply filters based on searchTerm
        $query->orFilterWhere(['like', 'id', $this->searchTerm])
              ->orFilterWhere(['like', 'nama_poliklinik', $this->searchTerm]);

        return $dataProvider;
    }
}
