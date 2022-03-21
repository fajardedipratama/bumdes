<?php

namespace app\models\search;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SetoranKios;

/**
 * SetorankiosSearch represents the model behind the search form of `app\models\SetoranKios`.
 */
class SetorankiosSearch extends SetoranKios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama_setoran', 'tgl_setoran'], 'safe'],
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
        $query = SetoranKios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['id'=>SORT_DESC]]
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
        ]);

        if(!empty($this->tgl_setoran)){    
            $query->andFilterWhere([
                'tgl_setoran' => Yii::$app->formatter->asDate($this->tgl_setoran,'yyyy-MM-dd'),
            ]);
        }

        $query->andFilterWhere(['like', 'nama_setoran', $this->nama_setoran]);

        return $dataProvider;
    }
}
