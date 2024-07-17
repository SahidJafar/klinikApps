<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pasien;

/**
 * PasienSearch represents the model behind the search form of `app\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * {@inheritdoc}
     */
    public $searchTerm;

    public function rules()
    {
        return [
            [['id', 'nama', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telepon', 'searchTerm'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Pasien::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Apply filters based on searchTerm
        $query->orFilterWhere(['like', 'id', $this->searchTerm])
              ->orFilterWhere(['like', 'nama', $this->searchTerm])
              ->orFilterWhere(['like', 'alamat', $this->searchTerm])
              ->orFilterWhere(['like', 'jenis_kelamin', $this->searchTerm])
              ->orFilterWhere(['like', 'tanggal_lahir', $this->searchTerm])
              ->orFilterWhere(['like', 'nomor_telepon', $this->searchTerm]);

        return $dataProvider;
    }
}
