<?php
return [
    'plugin' => [
        'name' => 'Meta',
        'description' => 'Provides an easy interface to insert HTML meta and link tags in any page.'
    ],
    'components' => [
        'metaList' => [
            'name' => 'Meta List',
            'description' => 'Injects the HTML meta tags into the page.',
            'escape' => [
                'title' => 'Escape tag values?',
                'description' => 'Escape the meta tag values using PHP\'s htmlentities() function'
            ],
            'includePageMeta' => [
                'title' => 'Include page meta?',
                'description' => 'Automatically inserts meta tags for the page meta values provided in October CMS'
            ]
        ],
        'linkList' => [
            'name' => 'Link List',
            'description' => 'Injects the HTML link tags into the page.',
            'escape' => [
                'title' => 'Escape tag values?',
                'description' => 'Escape the link tag values using PHP\'s htmlentities() function'
            ],
        ],
        'jsonLdList' => [
            'name' => 'JSON-LD List',
            'description' => 'Injects the JSON-LD blocks into the page.',
            'escape' => [
                'title' => 'Escape JSON-LD content?',
                'description' => 'Escape the JSON-LD content using PHP\'s htmlentities() function'
            ],
        ]
    ]
];
