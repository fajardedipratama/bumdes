<?php

namespace app\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bgmart;

/**
 * BgmartSearch represents the model behind the search form of `app\models\Bgmart`.
 */
class BgmartSearch extends Bgmart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jumlah'], 'integer'],
            [['tgl_setor', 'nama_setoran'], 'safe'],
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
        $query = Bgmart::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['tgl_setor'=>SORT_DESC]]
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
            'jumlah' => $this->jumlah,
        ]);

        if(!empty($this->tgl_setor)){    
            $query->andFilterWhere([
                'tgl_setor' => Yii::$app->formatter->asDate($this->tgl_setor,'yyyy-MM-dd'),
            ]);
        }

        $query->andFilterWhere(['like', 'nama_setoran', $this->nama_setoran]);

        return $dataProvider;
    }
}
