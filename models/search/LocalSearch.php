<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Local;

/**
 * LocalSearch represents the model behind the search form about `app\models\Local`.
 */
class LocalSearch extends Local
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_local', 'zona_reparto_km', 'id_empresa', 'id_turno'], 'integer'],
            [['nombre', 'direccion', 'latitud', 'longitud', 'telefono', 'status', 'usuario', 'password'], 'safe'],
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
        $session = \Yii::$app->session;
        if(!$session->has('admin'))
        {
            $this->redirect("/admin/empresa/superlogin");
        }

        $query = Local::find()->where("id_empresa = :id_empresa", [':id_empresa' => $session['admin']->id]);

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
            'id_local' => $this->id_local,
            'zona_reparto_km' => $this->zona_reparto_km,
            'id_empresa' => $this->id_empresa,
            'id_turno' => $this->id_turno,
            'costo_envio' => $this->costo_envio,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'latitud', $this->latitud])
            ->andFilterWhere(['like', 'longitud', $this->longitud])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'usuario', $this->usuario])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
