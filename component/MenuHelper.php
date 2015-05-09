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

        $locales = implode(",", $session['locales-web']);

        $data = (new Query())
            ->select('*')
            ->from('rubro')
            ->join("INNER JOIN", "empresa", "empresa.id_rubro = rubro.id_rubro")
            ->join("INNER JOIN", "local", "local.id_empresa = empresa.id_empresa")
            ->where(['local.id_local' => $locales])
            ->all();

        echo "<pre>";print_r($data);die();

        $response[] = [
                    'label' => 'ola',
                    'url' => ['#'],
                    'items' => [
                        '<li class="dropdown-header">Dropdown Header</li>',
                        '<li class="divider"></li>',
                    ]
                ];

        return $response;
    }
}