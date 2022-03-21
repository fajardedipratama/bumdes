<?php

namespace app\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MobilSewa;

/**
 * MobilsewaSearch represents the model behind the search form of `app\models\MobilSewa`.
 */
class MobilsewaSearch extends MobilSewa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mobil_id', 'biaya'], 'integer'],
            [['nama', 'no_identitas', 'alamat', 'no_hp', 'keperluan', 'tgl_sewa', 'tgl_selesai'], 'safe'],
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
        $query = MobilSewa::find();

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

        if(!empty($this->tgl_sewa)){    
            $query->andFilterWhere([
                'tgl_sewa' => Yii::$app->formatter->asDate($this->tgl_sewa,'yyyy-MM-dd'),
            ]);
        }
        if(!empty($this->tgl_selesai)){    
            $query->andFilterWhere([
                'tgl_selesai' => Yii::$app->formatter->asDate($this->tgl_selesai,'yyyy-MM-dd'),
            ]);
        }

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'keperluan', $this->keperluan]);

        return $dataProvider;
    }
}
