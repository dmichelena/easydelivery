<?php
namespace component\;

class MenuHelper
{
    public static function getMenu()
    {
        return [
                    'label' => 'ola',
                    'url' => ['#'],
                    'items' => '<li class="dropdown-header">Dropdown Header</li>',
                    '<li class="divider"></li>',
                ];
    }
}