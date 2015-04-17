<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Delivery;

/**
 * DeliverySearch represents the model behind the search form about `app\models\Delivery`.
 */
class DeliverySearch extends Delivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_delivery', 'id_usuario', 'id_local', 'id_transporte', 'id_empresa'], 'integer'],
            [['destino_latitud', 'destino_longitud', 'telefono', 'status', 'paso', 'justificacion_cancelado', 'tipo_comprobante', 'nombre_receptor', 'dni_receptor'], 'safe'],
            [['costo_envio'], 'number'],
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
        $query = Delivery::find();

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
            'id_delivery' => $this->id_delivery,
            'id_usuario' => $this->id_usuario,
            'id_local' => $this->id_local,
            'costo_envio' => $this->costo_envio,
            'id_transporte' => $this->id_transporte,
            'id_empresa' => $this->id_empresa,
        ]);

        $query->andFilterWhere(['like', 'destino_latitud', $this->destino_latitud])
            ->andFilterWhere(['like', 'destino_longitud', $this->destino_longitud])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'paso', $this->paso])
            ->andFilterWhere(['like', 'justificacion_cancelado', $this->justificacion_cancelado])
            ->andFilterWhere(['like', 'tipo_comprobante', $this->tipo_comprobante])
            ->andFilterWhere(['like', 'nombre_receptor', $this->nombre_receptor])
            ->andFilterWhere(['like', 'dni_receptor', $this->dni_receptor]);

        return $dataProvider;
    }
}
