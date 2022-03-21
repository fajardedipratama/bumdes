<?php

namespace app\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MobilServis;

/**
 * MobilservisSearch represents the model behind the search form of `app\models\MobilServis`.
 */
class MobilservisSearch extends MobilServis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mobil_id', 'biaya'], 'integer'],
            [['tgl_servis', 'keterangan'], 'safe'],
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
        $query = MobilServis::find();

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
            'mobil_id' => $this->mobil_id,
            'biaya' => $this->biaya,
        ]);

        if(!empty($this->tgl_servis)){    
            $query->andFilterWhere([
                'tgl_servis' => Yii::$app->formatter->asDate($this->tgl_servis,'yyyy-MM-dd'),
            ]);
        }

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
