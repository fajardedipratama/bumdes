<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KiosKontrak;

/**
 * KioskontrakSearch represents the model behind the search form of `app\models\KiosKontrak`.
 */
class KioskontrakSearch extends KiosKontrak
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kios_id', 'tagihan'], 'integer'],
            [['awal_kontrak', 'akhir_kontrak'], 'safe'],
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
        $query = KiosKontrak::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'kios_id' => $this->kios_id,
            'awal_kontrak' => $this->awal_kontrak,
            'akhir_kontrak' => $this->akhir_kontrak,
            'tagihan' => $this->tagihan,
        ]);

        return $dataProvider;
    }
}
