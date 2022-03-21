<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mobil;

/**
 * MobilSearch represents the model behind the search form of `app\models\Mobil`.
 */
class MobilnonaktifSearch extends Mobil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun'], 'integer'],
            [['merek', 'nama_pemilik', 'nopol', 'no_rangka', 'no_mesin', 'warna', 'status'], 'safe'],
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
        $query = Mobil::find()->where(['status'=>'Nonaktif']);

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
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'merek', $this->merek])
            ->andFilterWhere(['like', 'nama_pemilik', $this->nama_pemilik])
            ->andFilterWhere(['like', 'nopol', $this->nopol])
            ->andFilterWhere(['like', 'no_rangka', $this->no_rangka])
            ->andFilterWhere(['like', 'no_mesin', $this->no_mesin])
            ->andFilterWhere(['like', 'warna', $this->warna])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
