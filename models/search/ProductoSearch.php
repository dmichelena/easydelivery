<?php

namespace app\models\search;

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
            [['id_producto', 'id_categoria', 'id_empresa'], 'integer'],
            [['nombre', 'foto', 'descipcion', 'status'], 'safe'],
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
        $session = \Yii::$app->session;
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
        }

        $query = Producto::find()->where(":id_empresa = :id_empresa", [':id_empresa' => $session['admin']->id]);

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
            'id_categoria' => $this->id_categoria,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'descipcion', $this->descipcion])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
