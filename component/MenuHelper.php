<?php
namespace app\component;

use app\models\Rubro;
use yii\db\Query;

class MenuHelper
{
    public static function getMenu()
    {
        $session = \Yii::$app->session;

        if(!$session->has('locales-web'))
        {
            return [];
        }

        $locales = $session['locales-web'];

        $data = (new Query())
            ->select('rubro.nombre, rubro.id_rubro')
            ->distinct('rubro.nombre')
            ->from('rubro')
            ->join("INNER JOIN", "empresa", "empresa.id_rubro = rubro.id_rubro")
            ->join("INNER JOIN", "local", "local.id_empresa = empresa.id_empresa")
            ->where(['local.id_local' => $locales])
            ->all();

        $items = [];
        foreach($data as $d)
        {
            $items[] = [
                'label' => $d['nombre'],
                'url'   => '/pedido/productos?id_rubro='.$d['id_rubro'],
            ];
        }

        $response[] = [
                    'label' => 'Rubro',
                    'url' => ['#'],
                    'items' => $items
                ];

        return $response;
    }
}