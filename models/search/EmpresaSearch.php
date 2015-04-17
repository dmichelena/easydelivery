<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_rubro'], 'integer'],
            [['razon_social', 'ruc', 'telefono', 'direccion', 'status', 'foto', 'usuario', 'password'], 'safe'],
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
        $query = Empresa::find();

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
            'id_empresa' => $this->id_empresa,
            'id_rubro' => $this->id_rubro,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'ruc', $this->ruc])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
