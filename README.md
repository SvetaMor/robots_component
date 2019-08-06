# robots_component

В конфигурации прописать (пример):

    'container' => [
        'definitions' => [
            \app\vendor\svetamor\robots\interfaces\ICreatingFile::class => [
                'class' => \app\vendor\svetamor\robots\CreatingTxt::class, 
                'filePath' => '/robots.txt',
            ], 
    'modules' => [
            'robots' => [
                'class' => '\app\modules\Module',
                'components'    => [
                    'robotsComponent' => [
                        'class' => \app\vendor\svetamor\robots\RobotsComponent::class,
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
        
в контроллере:

    $module = \Yii::$app->getModule('robots');
        
    $response = \Yii::$app->response;
    $response->format = \yii\web\Response::FORMAT_RAW;
    $response->headers->set('Content-Type', 'text/plain');
        
    return $module->robotsComponent->render();
    