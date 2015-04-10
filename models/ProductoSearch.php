<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_producto', 'stock', 'id_categoria', 'id_local', 'id_user'], 'integer'],
            [['nombre', 'foto', 'descipcion', 'status'], 'safe'],
            [['precio_unitario', 'precio_envio'], 'number'],
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
        $query = Producto::find();
        $query->where("id_usuario=:id_usuario", [':id_usuario' => Yii::$app->user->identity->id]);

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
            'stock' => $this->stock,
            'precio_unitario' => $this->precio_unitario,
            'precio_envio' => $this->precio_envio,
            'id_categoria' => $this->id_categoria,
            'id_local' => $this->id_local,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'descipcion', $this->descipcion])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
