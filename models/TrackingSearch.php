<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tracking;

/**
 * TrackingSearch represents the model behind the search form about `app\models\Tracking`.
 */
class TrackingSearch extends Tracking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tracking', 'id_delivery'], 'integer'],
            [['latitud', 'longitud'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Tracking::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tracking' => $this->id_tracking,
            'id_delivery' => $this->id_delivery,
        ]);

        $query->andFilterWhere(['like', 'latitud', $this->latitud])
            ->andFilterWhere(['like', 'longitud', $this->longitud]);

        return $dataProvider;
    }
}
