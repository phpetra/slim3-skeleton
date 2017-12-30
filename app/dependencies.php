<?php
// DIC configuration

$container = $app->getContainer();

// TWIG
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    $view->getEnvironment()->addGlobal('sitename', $settings['view']['twig']['sitename']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// FLASH
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// LOGGER
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], $settings['logger']['level']));

    return $logger;
};

// DB
$container['pdo'] = function ($c) {
    $settings = $c->get('settings');
    $pdo = new PDO(
        "mysql:host={$settings['db']['host']};dbname={$settings['db']['database']};charset={$settings['db']['charset']}",
        $settings['db']['username'],
        $settings['db']['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
};

// service example
//$container['some_service'] = function ($c) {
//    return new \App\SomeService($c->get('pdo'));
//};

// actions
$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};