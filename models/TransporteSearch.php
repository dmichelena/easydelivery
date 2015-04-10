<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transporte;

/**
 * TransporteSearch represents the model behind the search form about `app\models\Transporte`.
 */
class TransporteSearch extends Transporte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transporte', 'id_turno', 'id_local', 'id_user'], 'integer'],
            [['nombre', 'apellido', 'dni', 'domicilio', 'telefono', 'licencia_conducir', 'placa_vehiculo', 'status'], 'safe'],
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
        $query = Transporte::find();
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
            'id_transporte' => $this->id_transporte,
            'id_turno' => $this->id_turno,
            'id_local' => $this->id_local,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'dni', $this->dni])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'licencia_conducir', $this->licencia_conducir])
            ->andFilterWhere(['like', 'placa_vehiculo', $this->placa_vehiculo])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
