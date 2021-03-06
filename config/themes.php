<?php

return [
    'default' => 'default',

    'themes' => [
        'default' => [
            'views_path' => 'resources/themes/default/views',
            'assets_path' => 'public/themes/default/assets',
            'name' => 'Default'
        ],

        // 'bliss' => [
        //     'views_path' => 'resources/themes/bliss/views',
        //     'assets_path' => 'public/themes/bliss/assets',
        //     'name' => 'Bliss',
        //     'parent' => 'default'
        // ],

        'pokli-default' => [
            'views_path' => 'resources/themes/pokli-default/views',
            'assets_path' => 'public/themes/pokli-default/assets',
            'name' => 'Pokli - Default',
            'parent' => 'default'
        ]
    ]
];