<?php

namespace app\models\search;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kios as KiosModel;

/**
 * Kios represents the model behind the search form of `app\models\Kios`.
 */
class Kios extends KiosModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_kios','biaya_sewa'], 'integer'],
            [['nama', 'no_ktp', 'no_hp', 'alamat', 'jenis_dagang','awal_sewa', 'akhir_sewa'], 'safe'],
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
        $query = KiosModel::find()->where(['>=','akhir_sewa',date('Y-m-d')]);
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>['defaultOrder'=>['akhir_sewa'=>SORT_ASC]]
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
            'no_kios' => $this->no_kios,
            'biaya_sewa' => $this->biaya_sewa,
        ]);

        if(!empty($this->awal_sewa)){    
            $query->andFilterWhere([
                'awal_sewa' => Yii::$app->formatter->asDate($this->awal_sewa,'yyyy-MM-dd'),
            ]);
        }
        if(!empty($this->akhir_sewa)){    
            $query->andFilterWhere([
                'akhir_sewa' => Yii::$app->formatter->asDate($this->akhir_sewa,'yyyy-MM-dd'),
            ]);
        }

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'jenis_dagang', $this->jenis_dagang]);

        return $dataProvider;
    }
}
