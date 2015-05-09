<?php
namespace app\component;

class MenuHelper
{
    public static function getMenu()
    {
        $response[] = [
                    'label' => 'ola',
                    'url' => ['#'],
                    'items' => ['<li class="dropdown-header">Dropdown Header</li>',
                    '<li class="divider"></li>',]
                ];

        return $response;
    }
}