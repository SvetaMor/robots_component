# robots_component
В конфигурации:
'modules' => [
        'robots' => [
            'class' => 'app\components\robots\Module',
            'components'    => [
                'robotsComponent' => [
                    'class' => \app\components\robots\RobotsComponent::class,
                    'userAgent' => [
                        '*' => [
                            'Disallow' => [
                                '/articles',
                                '/logs',
                            ],
                            'Allow' => [
                                //..
                            ],
                        ],
                        'WebBot' => [
                            'Disallow' => [
                                '/',
                            ],
                        ],
                    ],
                    'host' => 'site.ru',
                    'sitemap' => 'http://site.ru/sitemap.xml',
                ],
            ],
        ],
    ],