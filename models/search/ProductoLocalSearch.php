<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductoLocal;

/**
 * ProductoLocalSearch represents the model behind the search form about `app\models\ProductoLocal`.
 */
class ProductoLocalSearch extends ProductoLocal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_local', 'stock'], 'integer'],
            [['precio'], 'number'],
            [['status'], 'safe'],
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
        $query = ProductoLocal::find();

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
            'id_producto' => $this->id_producto,
            'id_local' => $this->id_local,
            'stock' => $this->stock,
            'precio' => $this->precio,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
