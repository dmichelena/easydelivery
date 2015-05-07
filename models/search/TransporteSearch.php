<?php

namespace app\models\search;

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
            [['id_transporte', 'id_turno', 'id_local'], 'integer'],
            [['nombre', 'apellido_p', 'apellido_m', 'domicilio', 'telefono', 'licencia_conducir', 'placa_vehiculo', 'status', 'longitud', 'latitud', 'usuario', 'password'], 'safe'],
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
        $query = Transporte::find()->join("INNER JOIN", 'local', 'transporte.id_local = local.id_local')->where("local.id_local = :id_local"[
            ":id_local" => $session['admin']->id;
        ]);

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
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido_p', $this->apellido_p])
            ->andFilterWhere(['like', 'apellido_m', $this->apellido_m])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'licencia_conducir', $this->licencia_conducir])
            ->andFilterWhere(['like', 'placa_vehiculo', $this->placa_vehiculo])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'longitud', $this->longitud])
            ->andFilterWhere(['like', 'latitud', $this->latitud])
            ->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
