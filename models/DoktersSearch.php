<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dokters;

/**
 * DoktersSearch represents the model behind the search form of `app\models\Dokters`.
 */
class DoktersSearch extends Dokters
{
    /**
     * {@inheritdoc}
     */
    public $searchTerm;
    public function rules()
    {
        return [
            [['id', 'id_poliklinik', 'nama_dokter', 'spesialis', 'alamat', 'nomor_telepon'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Dokters::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->orFilterWhere(['like', 'id', $this->searchTerm])
            ->orFilterWhere(['like', 'id_poliklinik', $this->searchTerm])
            ->orFilterWhere(['like', 'nama_dokter', $this->searchTerm])
            ->orFilterWhere(['like', 'spesialis', $this->searchTerm])
            ->orFilterWhere(['like', 'alamat', $this->searchTerm])
            ->orFilterWhere(['like', 'nomor_telepon', $this->searchTerm]);

        return $dataProvider;
    }
}
